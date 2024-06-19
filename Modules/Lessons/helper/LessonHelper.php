<?php

use Modules\Categories\src\Models\Category;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use Modules\Lessons\src\Models\Lesson;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;

if (!function_exists('getLessons')) {
    function getLessons($lessons, $parent_id = 0, $char = '')
    {
        $id = request()->route()->id;
        if ($id) {
            $currentParentId = Lesson::where('id', $id)->pluck('parent_id')->first();
        } else {
            $currentParentId = null;
        }
        if (request()->module) {
            $module = request()->module;
        } else {
            $module = null;
        }


        foreach ($lessons as $key => $lesson) {
            if ($lesson->parent_id == $parent_id) {
                $selected =
                    ($currentParentId !== null && $currentParentId == $lesson->id)
                    || old('parent_id') == $lesson->id || ($module !== null && $module == $lesson->id) ? 'selected' : '';
                echo '<option id="' . $id . '" value="' . $lesson->id . '" ' . $selected . '>
            ' . $char . $lesson->name . '</option>';

                unset($lessons[$key]);
                getCategories($lessons, $lesson->id, $char . '-| ');
            }
        }
    };
}

if (!function_exists('getTime')) {

    function getTime($seconds)
    {
        $mins = floor($seconds / 60);
        $second = floor($seconds - $mins * 60);
        $mins = $mins < 10 ? '0' . $mins : $mins;
        $second = $second < 10 ? '0' . $second : $second;
        return "$mins:$second";
    }
}

if (!function_exists('getLessonsClient')) {


    function getLessonsClient($lessons, $parent_id = 0, $color = 78, $margin = '', $number = 1)
    {

        foreach ($lessons as $key => $lesson) {
            if ($lesson->parent_id == $parent_id) {

                $rgb = 'rgb(' . $color . ',115,223)';
                $is_trial = $lesson->is_trial == 1 ? '<p class="badge bg-info text-dark is_trial" data-bs-toggle="modal" data-bs-target="#myModal1" data-id=' . $lesson->id . ' style="display: inline-block">Học thử</p>' : '';
                echo '<li>
                <a  class="play-btn ' . $margin . '" href="#"><i class="fa fa-play"></i></a>
                <span>
                    <div class="row" style="width:350px">
                    <a class="col-9" href="/lesson/' . $lesson->slug . '"> <div > <p style="color: ' . $rgb . '" ">Bài:' . $number . ' ' . $lesson->name . '</p>  </div></a>
                    <div class="col-3"> ' . $is_trial . '</div>
                    </div>
                    <span>' . getTime($lesson->durations) . '</span> 
                </span>
                </li>
                ';
                $number++;
                unset($lessons[$key]);
                getLessonsClient($lessons, $lesson->id, $color + 1000, 'ms-3', $number++);
            }
        }
    }

    if (!function_exists('courseOfLesson')) {
        function courseOfLesson($courseId)
        {
            $courseRepository = app(LessonsRepositoryInterface::class);
            return $courseRepository->courseOfLesson($courseId);
        }
    }
}
