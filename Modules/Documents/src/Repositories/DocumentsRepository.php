<?php
namespace Modules\Documents\src\Repositories;
use Modules\Documents\src\Repositories\DocumentsRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Documents\src\Models\Documents;

class DocumentsRepository extends BaseRepository implements DocumentsRepositoryInterface{
    public function getModel(){
        return Documents::class;
    }

}

?>