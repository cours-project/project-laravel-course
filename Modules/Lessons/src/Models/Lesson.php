<?php

namespace Modules\Lessons\src\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Lessons as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Courses\src\Models\Course;
use Modules\Documents\src\Models\Document;
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

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
    public function document()
    {
        return $this->hasOne(Document::class, 'id', 'document_id');
    }

    public function course()
    {
        return $this->belongsTo(
            Course::class,
            'course_id',
            'id'
        )->select('id', 'name', 'thumbnail');
    }
    public function scopeActive(Builder $query): void
    {
       queryActive($query);
    }
}
