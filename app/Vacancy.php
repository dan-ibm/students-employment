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

}
