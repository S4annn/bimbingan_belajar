<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['course', 'teacher', 'student'])
            ->latest()
            ->paginate(10);
            
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        $students = Student::all();
        
        return view('schedules.create', compact('courses', 'teachers', 'students'));
    }

    public function store(StoreScheduleRequest $request)
    {
        Schedule::create($request->validated());
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        $students = Student::all();
        
        return view('schedules.edit', compact('schedule', 'courses', 'teachers', 'students'));
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->validated());
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $schedules = Schedule::whereHas('student', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('teacher', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('course', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);
    
        return view('schedules.index', compact('schedules', 'search'));
    }
    
}