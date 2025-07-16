<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());
        return redirect()->route('courses.index')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        return redirect()->route('courses.index')->with('success', 'Data mata pelajaran berhasil diperbarui!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Mata pelajaran berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $courses = Course::where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->paginate(10);
    
        return view('courses.index', compact('courses', 'search'));
    }
    
}