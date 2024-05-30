<?php

use Modules\Categories\src\Models\Category;

if (!function_exists('getLessons')) {
function getLessons($lessons,$parent_id = 0,$char=''){
    $id = request()->route()->id;
    if($id){
        $currentParentId = \Modules\Categories\src\Models\Category::where('id',$id)->pluck('parent_id')->first();
    }else{
        $currentParentId = null;
    }
    foreach($lessons as $key => $lesson){
        if($lesson->parent_id == $parent_id){
            $selected = ($currentParentId !== null && $currentParentId == $lesson->id) || old('parent_id') == $lesson->id ? 'selected' : '';
            echo '<option id="'.$id.'" value="'.$lesson->id.'" '.$selected.'>
            '.$char.$lesson->name.'</option>';
            
            unset($lessons[$key]);
            getCategories($lessons,$lesson->id,$char.'-| ');
        }
    }
};
}
