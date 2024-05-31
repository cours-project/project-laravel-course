<?php
namespace Modules\Students\src\Repositories;
use Modules\Students\src\Repositories\StudentsRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Students\src\Models\Student;

class StudentsRepository extends BaseRepository implements StudentsRepositoryInterface{
    public function getModel(){
        return Student::class;
    }
    
}

?>