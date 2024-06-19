<?php
namespace Modules\Lessons\src\Repositories;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Lessons\src\Models\Lesson;

class LessonsRepository extends BaseRepository implements LessonsRepositoryInterface{
    public function getModel(){
        return Lesson::class;
    }
    
    public function getPosition($courseId){
        $result = $this->model->where('course_id',$courseId)->count();
        return $result +1 ;
    }

    public function getLessons($courseId)
    {
        return $this->model->with('subLessons')->whereCourseId($courseId)->whereNull('parent_id')->select(['id', 'name', 'slug', 'is_trial', 'parent_id', 'view', 'durations', 'course_id','created_at']);
    }

    public function getModuleByPosition($course){
        return $course->lessons()->whereNull('parent_id')->orderBy('position', 'asc')->active()->get();
        
    }

    public function getLessonByPosition($course){
        return $course->lessons()->whereNotNull('parent_id')->active();
       
    }

    public function getTrialVideo($lesson_id){
        return $this->model->with('video')->where('id',$lesson_id)->select('id','name','video_id','is_trial');
    }
    
    public function findBySlug($slug){
        return $this->model->with('video')->where('slug',$slug);
    }
   
    function courseOfLesson($courseId){
        return $this->model->where('course_id',$courseId)->get();
    }

}

?>