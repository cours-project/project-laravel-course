
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
        $hours = floor($seconds / 3600);
        $min = floor(($seconds % 3600) / 60);
        return $hours . ' giờ ' . $min . ' phút';
    }
    
}
if (!function_exists('queryActive')) {
     function queryActive($query){
        return $query->where('status',1);
    }
}