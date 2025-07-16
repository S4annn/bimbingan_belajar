<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        Teacher::create($request->validated());
        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan!');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
        return redirect()->route('teachers.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $teachers = Teacher::where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('phone', 'like', "%{$search}%")
            ->paginate(10);
    
        return view('teachers.index', compact('teachers', 'search'));
    }
    
}