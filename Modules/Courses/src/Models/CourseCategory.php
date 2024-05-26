<?php

namespace Modules\Courses\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Courses as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Categories\src\Models\Category;

class CourseCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    function categories(){
        $this->belongsToMany(Category::class);
    }
    function courses(){
        $this->belongsToMany(Course::class);
    }
}
