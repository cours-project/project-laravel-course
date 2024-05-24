<?php
namespace Modules\Categories\src\Repositories;
use Modules\Categories\src\Repositories\CategoriesRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Categories\src\Models\Category;

class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface{
    public function getModel(){
        return Category::class;
    }
    public function getCategories(){
        return $this->model->select(['name','slug','parent_id','created_at','id'])->latest();
    }

}

?>