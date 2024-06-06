<?php

namespace Modules\Courses\src\Models;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Courses as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Categories\src\Models\Category;
use Modules\Lessons\src\Models\Lesson;
use Modules\Teacher\src\Models\Teacher;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    // protected static function booted(): void
    // {
    //     static::addGlobalScope(new ActiveScope);
    // }

   

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_courses');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }
}
