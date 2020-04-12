<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        'org_name',
        'email',
        'phone'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
