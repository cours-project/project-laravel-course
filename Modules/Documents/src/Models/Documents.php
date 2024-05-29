<?php

namespace Modules\Documents\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Documents as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documents extends Model
{
    use HasFactory;
    protected $guarded = [];


}
