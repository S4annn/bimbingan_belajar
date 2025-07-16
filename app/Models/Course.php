<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'level',
        'price',
        'duration',
        'is_active'
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}