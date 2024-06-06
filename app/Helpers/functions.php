
<?php

use Illuminate\Support\Facades\File;

function deleteFileStorage($image)
{
    $imageThumb = dirname($image) . '/thumbs/' . basename($image);
    unlink(public_path($image));
    unlink(public_path($imageThumb));
}
if (!function_exists('getHours')) {
    function getHours($seconds){
      
        $hours =round($seconds/3600);
        $min = round(($seconds - ($hours*3600))/60);
        return $hours.':'.$min.' phút';

    }
}