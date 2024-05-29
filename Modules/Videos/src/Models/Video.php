<?php

namespace Modules\Videos\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Videos as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];


}
