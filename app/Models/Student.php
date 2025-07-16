<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birth_date',
        'school',
        'grade',
        'notes',
        'parent_name',
        'parent_phone',
        'nis' 
    ];

    protected $dates = ['birth_date'];

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
