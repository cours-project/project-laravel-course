<?php
namespace Modules\Lessons\src\Repositories;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Lessons\src\Models\Lessons;

class LessonsRepository extends BaseRepository implements LessonsRepositoryInterface{
    public function getModel(){
        return Lessons::class;
    }

}

?>