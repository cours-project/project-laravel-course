<?php
namespace Modules\Home\src\Repositories;
use Modules\Home\src\Repositories\HomeRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Home\src\Models\Home;

class HomeRepository extends BaseRepository implements HomeRepositoryInterface{
    public function getModel(){
        return Home::class;
    }

}

?>