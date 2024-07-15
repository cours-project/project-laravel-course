<?php
namespace Modules\Orders\src\Repositories;
use Modules\Orders\src\Repositories\OrdersRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Orders\src\Models\Order;

class OrdersRepository extends BaseRepository implements OrdersRepositoryInterface{
    public function getModel(){
        return Order::class;
    }
    public function getOrdersByStudents($studentId,$filter,$limit){
        $query = $this->model->with('orderStatus')->where('student_id',$studentId);
        extract($filter);
        
        if(isset($status_id)){
            $query->where('status_id',$status_id);
        }
        if(isset($start_date)){
            $query->where('created_at','>=',$start_date);
        }if(isset($end_date)){
            $query->where('created_at','<=',$end_date);
        }if(isset($total)){
            $query->whereBetween('total', [$total - 50000, $total + 5000]);
        }
        return $query->paginate($limit)->withQueryString();
    }

}

?>