<?php
use Modules\Categories\src\Models\Category;
use Modules\Courses\src\Models\CourseCategory;
if (!function_exists('getCategoriesCheckbox')) {
function getCategoriesCheckbox($categories,$parent_id = 0,$char=''){
    $id = request()->route()->id;

    // if(old('categories')){
    //     foreach(old('categories') as $category_id){
    //         $
    //     }
    // }

    foreach ($categories as $key => $category) {
        if ($category->parent_id == $parent_id) {

            $checked = is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '';
           
            $category_ids = CourseCategory::where('course_id',$id)->pluck('category_id')->toArray();
            
            $checked2 = (is_array($category_ids) || (isset($category_ids))) && in_array($category->id, $category_ids) ? 'checked' : '';

            echo '<input type="checkbox" 
            class="d-block" name="categories[]" 
            value="'.$category->id.'"
            '.$checked.' ' .$checked2. '  
            >'.$char.$category->name.'</input>';
            unset($categories[$key]);
            getCategoriesCheckbox($categories, $category->id, $char.'-| ');
        }
    }
    
};
}