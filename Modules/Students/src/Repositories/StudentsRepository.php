<?php
namespace Modules\Students\src\Repositories;
use Modules\Students\src\Repositories\StudentsRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Students\src\Models\Student;

class StudentsRepository extends BaseRepository implements StudentsRepositoryInterface{
    public function getModel(){
        return Student::class;
    }

    public function getCourses($studentId,$filter = [],$limit){
        $query = $this->model->find($studentId)->courses();
        extract($filter);
        if($filter){
            if(isset($filter['teacher_id'])){
                $query->where('teacher_id',$filter['teacher_id']);
            }
            if(isset($keyword)){
                $query->where(function ($builder) use ($keyword){
                    $builder->where('name', 'like', '%' . $keyword . '%');
                    $builder->orWhere('detail', 'like', '%' . $keyword . '%');
                });
            }

        }
        
        return $query->paginate($limit)->withQueryString();
    }
    
}

?>