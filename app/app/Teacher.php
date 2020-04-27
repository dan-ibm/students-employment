<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function students() {
        return $this->belongsToMany('App\Student', 'student_teacher', 'teacher_id', 'student_id')->
        withPivot('grade', 'comment');
    }
}
