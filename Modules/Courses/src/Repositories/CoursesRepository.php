<?php
namespace Modules\Courses\src\Repositories;

use App\Models\Scopes\ActiveScope;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Courses\src\Models\Course;
use Modules\Lessons\src\Models\Lesson;

class CoursesRepository extends BaseRepository implements CoursesRepositoryInterface{
    public function getModel(){
        return Course::class;
    }

    public function getAllCourses()
    {
        return $this->model->select(['id', 'name', 'price', 'status', 'sale_price', 'created_at','code'])->latest();
    }

  

    // /CLIENTS
    public function getCourses($limit)
    {
        return $this->model->latest()->paginate($limit);
    }

    // public function lessons(){
    //      return $this->hasMany(Lesson::class, 'course_id', 'id');
    // }
    
    public function courseDetail($slug){
        return $this->model->where('slug',$slug)->get();
    }
}

?>