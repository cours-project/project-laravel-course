<?php

namespace Modules\Auth\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Auth as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auth extends Model
{
    use HasFactory;
    protected $guarded = [];


}
