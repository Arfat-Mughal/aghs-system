<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image compression defaults
    |--------------------------------------------------------------------------
    |
    | Every uploaded image in the app is run through App\Services\ImageService
    | before it is persisted. These values control that pass.
    |
    | Per-call overrides: pass an $opts array to compressToPublic() /
    | compressToDisk(), e.g. ['format' => 'jpg', 'quality' => 85].
    | 'format' => 'jpg' is used for student photos, which get embedded into
    | dompdf-generated PDFs (dompdf cannot reliably render WebP).
    |
    */

    // Longest edge in pixels. Larger images are downscaled; smaller are left as-is (never upscaled).
    'max_edge' => 1600,

    // Encoder quality, 0-100.
    'quality' => 78,

    // Default output format / container for raster uploads.
    'format' => 'webp',

];
