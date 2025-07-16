<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birth_date',
        'specialization',
        'qualification',
        'join_date',
        'salary',
        'status'
    ];

    protected $dates = ['birth_date', 'join_date'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}