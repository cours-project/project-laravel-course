<?php
namespace Modules\Categories\src\Repositories;
use Modules\Categories\src\Repositories\CategoriesRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Categories\src\Models\Categories;

class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface{
    public function getModel(){
        return Categories::class;
    }

}

?>