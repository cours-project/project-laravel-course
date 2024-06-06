<?php

use Modules\Categories\src\Models\Category;
use Modules\Courses\src\Models\CourseCategory;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;

if (!function_exists('getCategoriesCheckbox')) {
    function getCategoriesCheckbox($categories, $parent_id = 0, $char = '')
    {
        $id = request()->route()->id;

        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {

                $checked = is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '';

                $category_ids = CourseCategory::where('course_id', $id)->pluck('category_id')->toArray();

                $checked2 = (is_array($category_ids) || (isset($category_ids))) && in_array($category->id, $category_ids) ? 'checked' : '';

                echo '<input type="checkbox" 
            class="d-block" name="categories[]" 
            value="' . $category->id . '"
            ' . $checked . ' ' . $checked2 . '  
            >' . $char . $category->name . '</input>';
                unset($categories[$key]);
                getCategoriesCheckbox($categories, $category->id, $char . '-| ');
            }
        }
    };
}

if (!function_exists('getCategoriesOfCourse')) {
    function getCategoriesOfCourse($id_course)
    {
        $categoryIds = CourseCategory::where('course_id', $id_course)->get();
        foreach ($categoryIds as $categoryId) {
            $category = Category::where('id', $categoryId->category_id)->where('parent_id', 0)->first();
          
            if(isset($category->parent_id)){
           
            echo '
                   <a href="#">'.$category->name .' </a>
             ';
      
            }
        }
    }
}
if (!function_exists('formatPrice')) {
    function formatPrice($price){
        return number_format($price) .' đ' ;
    }
}
if (!function_exists('countModule')) {
    function countModule($course){
        $countModule = $course->lessons->whereNull('parent_id')->count();
        return $countModule ;
    }
}
if (!function_exists('countLesson')) {
    function countLesson($course){
        $countLesson = $course->lessons->whereNotNull('parent_id')->count();
        return $countLesson ;
    }
}
if (!function_exists('getModuleByPosition')) {
    function getModuleByPosition($course){
        $lessonRepository = app(LessonsRepositoryInterface::class);
        return $lessonRepository->getModuleByPosition($course);
    }
}