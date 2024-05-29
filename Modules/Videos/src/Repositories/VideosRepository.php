<?php
namespace Modules\Videos\src\Repositories;
use Modules\Videos\src\Repositories\VideosRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Videos\src\Models\Video;

class VideosRepository extends BaseRepository implements VideosRepositoryInterface{
    public function getModel(){
        return Video::class;
    }

    public function createVideo($data){
        $this->model->firstOrCreate($data);
    }

}

?>