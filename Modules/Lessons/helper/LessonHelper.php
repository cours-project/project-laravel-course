<?php

use Modules\Categories\src\Models\Category;
use Modules\Lessons\src\Models\Lesson;


if (!function_exists('getLessons')) {
function getLessons($lessons,$parent_id = 0,$char=''){
    $id = request()->route()->id;
    if($id){
        $currentParentId =Lesson::where('id',$id)->pluck('parent_id')->first();
    }else{
        $currentParentId = null;
    }
    if(request()->module){
        $module = request()->module;
    }else{
        $module = null;
    }
   

    foreach($lessons as $key => $lesson){
        if($lesson->parent_id == $parent_id){
            $selected = 
            ($currentParentId !== null && $currentParentId == $lesson->id)
            || old('parent_id') == $lesson->id ||($module !== null && $module == $lesson->id) ? 'selected' : '';
            echo '<option id="'.$id.'" value="'.$lesson->id.'" '.$selected.'>
            '.$char.$lesson->name.'</option>';
            
            unset($lessons[$key]);
            getCategories($lessons,$lesson->id,$char.'-| ');
        }
    }
};
}

if (!function_exists('getTime')) {

    function getTime($seconds){
        $mins = floor($seconds / 60 );
        $second = floor($seconds - $mins*60) ;
        $mins = $mins < 10 ? '0'.$mins : $mins;
        $second = $second < 10 ? '0'.$second : $second;
        return "$mins:$second";
    }
}
