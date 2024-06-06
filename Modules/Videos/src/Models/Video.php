<?php

namespace Modules\Videos\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Videos as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Lessons\src\Models\Lesson;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function lesson(){
        return $this->hasOne(Lesson::class ,'video_id');
    }
}
