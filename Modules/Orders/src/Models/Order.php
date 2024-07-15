<?php

namespace Modules\Orders\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Orders as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'orders';

    public function orderStatus(){
        return $this->belongsTo(OrderStatus::class , 'status_id' , 'id');
    }
}
