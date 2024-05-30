<?php
namespace Modules\Documents\src\Repositories;
use Modules\Documents\src\Repositories\DocumentsRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Documents\src\Models\Document;

class DocumentsRepository extends BaseRepository implements DocumentsRepositoryInterface{
    public function getModel(){
        return Document::class;
    }
    public function createDocument($data){
        return $this->model->firstOrCreate($data);
    }

}

?>