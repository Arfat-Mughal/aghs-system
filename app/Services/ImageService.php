<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * Central image compression pipeline.
 *
 * Every uploaded image in the app must go through this service instead of
 * calling ->move() / ->storeAs() directly, so uploads are always downscaled
 * and re-encoded (to WebP by default) before they are persisted.
 */
class ImageService
{
    /**
     * Compress $file and write it into public/$dir.
     *
     * @param  string|null  $name  Base file name (slugified); a random suffix is always added.
     * @param  array{format?: string, quality?: int}  $opts
     * @return string  Web-relative path, e.g. "banners/banner-ab12cd34.webp".
     */
    public function compressToPublic(UploadedFile $file, string $dir, ?string $name = null, array $opts = []): string
    {
        $processed = $this->process($file, $opts);
        $relative = trim($dir, '/') . '/' . $this->fileName($name, $processed['ext']);
        $target = public_path($relative);

        File::ensureDirectoryExists(dirname($target));
        file_put_contents($target, $processed['bytes']);

        return $relative;
    }

    /**
     * Compress $file and write it to a storage disk (default: the local "public" disk).
     *
     * @param  string|null  $name  Base file name (slugified); a random suffix is always added.
     * @param  array{format?: string, quality?: int}  $opts
     * @return string  Disk-relative path, e.g. "uploads/authors/riaz-ab12cd34.webp".
     */
    public function compressToDisk(UploadedFile $file, string $dir, string $disk = 'public', ?string $name = null, array $opts = []): string
    {
        $processed = $this->process($file, $opts);
        $relative = trim($dir, '/') . '/' . $this->fileName($name, $processed['ext']);

        Storage::disk($disk)->put($relative, $processed['bytes']);

        return $relative;
    }

    /**
     * Decode, auto-orient, downscale and re-encode the upload.
     *
     * @param  array{format?: string, quality?: int}  $opts
     * @return array{bytes: string, ext: string}
     */
    protected function process(UploadedFile $file, array $opts): array
    {
        $raw = file_get_contents($file->getRealPath());

        // Animated GIFs must be detected BEFORE Image::make(), which silently
        // flattens them to the first frame. Keep them exactly as uploaded.
        if ($this->isAnimatedGif($file, $raw)) {
            return ['bytes' => $raw, 'ext' => 'gif'];
        }

        $maxEdge = (int) config('images.max_edge', 1600);
        $format = $opts['format'] ?? config('images.format', 'webp');
        $quality = (int) ($opts['quality'] ?? config('images.quality', 78));

        $img = Image::make($raw)->orientate();

        if ($img->width() > $maxEdge || $img->height() > $maxEdge) {
            $img->resize($maxEdge, $maxEdge, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        $bytes = (string) $img->encode($format, $quality);
        $img->destroy();

        return ['bytes' => $bytes, 'ext' => $format === 'jpeg' ? 'jpg' : $format];
    }

    protected function isAnimatedGif(UploadedFile $file, string $raw): bool
    {
        if (strtolower((string) $file->getClientOriginalExtension()) !== 'gif') {
            return false;
        }

        // NETSCAPE2.0 application-extension block, or more than one
        // graphic-control extension (\x00\x21\xF9\x04), means multi-frame.
        return str_contains($raw, 'NETSCAPE2.0')
            || substr_count($raw, "\x00\x21\xF9\x04") > 1;
    }

    protected function fileName(?string $name, string $ext): string
    {
        $base = Str::slug((string) $name);
        $base = $base !== '' ? $base : 'img';

        return $base . '-' . Str::lower(Str::random(20)) . '.' . $ext;
    }
}
