<?php

namespace Modules\Home\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Home as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;
    protected $guarded = [];


}
