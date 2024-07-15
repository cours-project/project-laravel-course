<?php
namespace Modules\Orders\src\Repositories;
use App\Repositories\RepositoryInterface;


interface OrdersRepositoryInterface extends RepositoryInterface{
    public function getOrdersByStudents($studentId,$filter,$limit);
}