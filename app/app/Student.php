<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'status',
        'hasJob',
        'resume'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vacancies() {
        return $this->belongsToMany('App\Vacancy', 'vacancy_student', 'student_id', 'vacancy_id');
    }

    public function teachers() {
        return $this->belongsToMany(Teacher::class, 'student_teacher', 'student_id', 'teacher_id')->
        withPivot('grade', 'comment');
    }
}
