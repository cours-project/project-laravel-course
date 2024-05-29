<?php

namespace Modules\Dashboard\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Dashboard as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dashboard extends Model
{
    use HasFactory;
    protected $guarded = [];


}
