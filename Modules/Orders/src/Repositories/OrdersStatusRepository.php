<?php
namespace Modules\Orders\src\Repositories;
use Modules\Orders\src\Repositories\OrdersStatusRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Orders\src\Models\Order;
use Modules\Orders\src\Models\OrderStatus;

class OrdersStatusRepository extends BaseRepository implements OrdersStatusRepositoryInterface{
    public function getModel(){
        return OrderStatus::class;
    }
    public function getAllOrdersStatus(){
        return  $this->model->orderBy('name','ASC')->get();
    }
    

}

?>