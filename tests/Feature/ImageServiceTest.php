<?php

namespace Tests\Feature;

use App\Services\ImageService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageServiceTest extends TestCase
{
    private ImageService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = app(ImageService::class);
    }

    /**
     * Build a reasonably "photographic" JPEG (random noise so it does not
     * compress to near-zero, which would make the size assertions meaningless).
     */
    private function noisyJpeg(int $width, int $height): string
    {
        $img = imagecreatetruecolor($width, $height);
        for ($x = 0; $x < $width; $x += 2) {
            for ($y = 0; $y < $height; $y += 2) {
                $color = imagecolorallocate($img, random_int(0, 255), random_int(0, 255), random_int(0, 255));
                imagefilledrectangle($img, $x, $y, $x + 1, $y + 1, $color);
            }
        }
        ob_start();
        imagejpeg($img, null, 100);
        imagedestroy($img);

        return ob_get_clean();
    }

    private function upload(string $bytes, string $name): UploadedFile
    {
        $tmp = tempnam(sys_get_temp_dir(), 'imgsvc');
        file_put_contents($tmp, $bytes);

        return new UploadedFile($tmp, $name, mime_content_type($tmp), null, true);
    }

    public function test_it_downscales_and_converts_to_webp_on_the_public_disk(): void
    {
        Storage::fake('public');
        $original = $this->noisyJpeg(4000, 3000);

        $path = $this->service->compressToDisk($this->upload($original, 'big.jpg'), 'uploads/test', 'public');

        $this->assertStringEndsWith('.webp', $path);
        Storage::disk('public')->assertExists($path);

        $bytes = Storage::disk('public')->get($path);
        [$w, $h] = getimagesizefromstring($bytes);
        $this->assertLessThanOrEqual(1600, max($w, $h));
        $this->assertLessThan(strlen($original) * 0.5, strlen($bytes));
    }

    public function test_format_override_keeps_jpeg(): void
    {
        Storage::fake('public');

        $path = $this->service->compressToDisk(
            $this->upload($this->noisyJpeg(2000, 2000), 'p.jpg'),
            'uploads/test',
            'public',
            'student-name',
            ['format' => 'jpg']
        );

        $this->assertStringEndsWith('.jpg', $path);
        $this->assertStringContainsString('student-name-', $path);
        $bytes = Storage::disk('public')->get($path);
        $this->assertSame('image/jpeg', (new \finfo(FILEINFO_MIME_TYPE))->buffer($bytes));
    }

    public function test_small_images_are_not_upscaled(): void
    {
        Storage::fake('public');

        $path = $this->service->compressToDisk($this->upload($this->noisyJpeg(300, 200), 's.jpg'), 'uploads/test', 'public');

        [$w, $h] = getimagesizefromstring(Storage::disk('public')->get($path));
        $this->assertSame(300, $w);
        $this->assertSame(200, $h);
    }

    public function test_animated_gif_is_stored_untouched(): void
    {
        Storage::fake('public');
        // Minimal GIF89a carrying the NETSCAPE2.0 looping extension → treated as animated.
        $gif = "GIF89a\x01\x00\x01\x00\x00\x00\x00"
            . "\x21\xFF\x0BNETSCAPE2.0\x03\x01\x00\x00\x00"
            . "\x21\xF9\x04\x00\x00\x00\x00\x00"
            . "\x2C\x00\x00\x00\x00\x01\x00\x01\x00\x00\x02\x02\x4C\x01\x00"
            . "\x21\xF9\x04\x00\x00\x00\x00\x00"
            . "\x2C\x00\x00\x00\x00\x01\x00\x01\x00\x00\x02\x02\x4C\x01\x00"
            . "\x3B";

        $path = $this->service->compressToDisk($this->upload($gif, 'loop.gif'), 'uploads/test', 'public');

        $this->assertStringEndsWith('.gif', $path);
        $this->assertSame($gif, Storage::disk('public')->get($path));
    }

    public function test_compress_to_public_writes_into_public_path(): void
    {
        $dir = 'testing-image-service';
        $target = public_path($dir);

        try {
            $path = $this->service->compressToPublic($this->upload($this->noisyJpeg(2500, 1800), 'b.jpg'), $dir, 'banner');

            $this->assertStringStartsWith($dir . '/banner-', $path);
            $this->assertFileExists(public_path($path));
            [$w, $h] = getimagesize(public_path($path));
            $this->assertLessThanOrEqual(1600, max($w, $h));
        } finally {
            File::deleteDirectory($target);
        }
    }
}
