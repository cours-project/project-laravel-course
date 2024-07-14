<?php

namespace Modules\Students\src\Models;

use App\Notifications\EmailChangePasswordSuccess;
use App\Notifications\EmailVerifyQueues;
use App\Notifications\PasswordChangerSuccess;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Courses\src\Models\Course;

class Student extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;
    protected $guarded = [];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerifyQueues);
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordChangerSuccess($token));
    }

    public function courses(){
        return $this->belongsToMany(Course::class ,'students_courses')->wherePivot('status', 1);
    }
}
