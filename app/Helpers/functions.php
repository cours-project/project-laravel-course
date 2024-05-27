
<?php

use Illuminate\Support\Facades\File;

function deleteFileStorage($image)
{
    $imageThumb = dirname($image) . '/thumbs/' . basename($image);
    unlink(public_path($image));
    unlink(public_path($imageThumb));
}