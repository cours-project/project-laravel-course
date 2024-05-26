<?php

namespace Modules\Courses\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Courses as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

}
