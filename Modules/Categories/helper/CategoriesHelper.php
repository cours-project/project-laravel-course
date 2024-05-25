<?php

use Modules\Categories\src\Models\Category;
if (!function_exists('getCategories')) {
function getCategories($categories,$parent_id = 0,$char=''){
    $id = request()->route()->id;
    if($id){
        $currentParentId = \Modules\Categories\src\Models\Category::where('id',$id)->pluck('parent_id')->first();
    }else{
        $currentParentId = null;
    }
    foreach($categories as $key => $category){
        if($category->parent_id == $parent_id){
            $selected = ($currentParentId !== null && $currentParentId == $category->id) || old('parent_id') == $category->id ? 'selected' : '';
            echo '<option id="'.$id.'" value="'.$category->id.'" '.$selected.'>
            '.$char.$category->name.'</option>';
            unset($categories[$key]);
            getCategories($categories,$category->id,$char.'-| ');
        }
    }
};
}
