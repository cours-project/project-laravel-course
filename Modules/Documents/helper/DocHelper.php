<?php
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

if (!function_exists('getInfoDoc')) {
function getInfoDoc($doc_path){

    $pathDoc = Storage::disk('public')->path(str_replace('/storage/','',$doc_path));

    return [
        'nameDoc' => basename($doc_path),
        'sizeDoc' => File::size($pathDoc)
    ];

}
}