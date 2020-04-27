<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'title',
        'position',
        'responsibilities',
        'requirements',
        'terms',
        'min_salary',
        'max_salary',
        'skills',
        'employer_id'
    ];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function students() {
        return $this->belongsToMany('App\Student', 'vacancy_student', 'vacancy_id', 'student_id');
    }

}
