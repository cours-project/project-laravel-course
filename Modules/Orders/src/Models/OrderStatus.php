<?php

namespace Modules\Orders\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Orders as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Orders\src\Models\Order;

class OrderStatus extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'orders_status';

    public function orders(){
        return $this->hasMany(Order::class , 'student_id','id');
    }
}
