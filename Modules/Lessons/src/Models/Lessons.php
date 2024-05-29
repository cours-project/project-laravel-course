<?php

namespace Modules\Lessons\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Lessons as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lessons extends Model
{
    use HasFactory;
    protected $guarded = [];


}
