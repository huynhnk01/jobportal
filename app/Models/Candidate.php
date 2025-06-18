<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'date_of_birth',
        'gender',
        'address',
        'phone',
        'experience_level',
        'desired_salary',
        'skills',
        'education_level',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
