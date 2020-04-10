<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'status',
        'hasJob',
        'resume'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
