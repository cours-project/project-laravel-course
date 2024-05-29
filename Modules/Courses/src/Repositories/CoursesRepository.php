<?php
namespace Modules\Courses\src\Repositories;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Courses\src\Models\Course;

class CoursesRepository extends BaseRepository implements CoursesRepositoryInterface{
    public function getModel(){
        return Course::class;
    }
    
}

?>