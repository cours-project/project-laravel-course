<?php
use Illuminate\Support\Facades\Storage;
if (!function_exists('getInfoVideo')) {
function getInfoVideo($video_path){
    $getID3 = new \getID3;
    $pathVid = Storage::disk('public')->path(str_replace('/storage/','',$video_path));
    return $infoVideo = $getID3->analyze($pathVid);

}
}