<?php

namespace Modules\Students\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Students as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];


}
