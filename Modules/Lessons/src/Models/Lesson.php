<?php

namespace Modules\Lessons\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Lessons as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Courses\src\Models\Course;
use Modules\Videos\src\Models\Video;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(Lesson::class, 'parent_id');
    }

    public function subLessons()
    {
        return $this->children()->orderBy('position', 'asc')->with('subLessons');
    }

    public function video(){
        return $this->belongsTo(Video::class,'video_id');
    }
    public function course()
    {
        return $this->belongsTo(
            Course::class,
            'course_id','id'
        )->select('id','name','thumbnail');
    }
    
   
   
}
