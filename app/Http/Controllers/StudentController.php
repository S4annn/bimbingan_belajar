<?php

    namespace App\Http\Controllers;

    use App\Models\Student;
    use Illuminate\Http\Request;
    use App\Http\Requests\StoreStudentRequest;
    use App\Http\Requests\UpdateStudentRequest;

    class StudentController extends Controller
    {
        public function index()
        {
            $students = Student::latest()->paginate(10);
            return view('students.index', compact('students'));
        }

        public function create()
        {
            return view('students.create');
        }

        public function store(StoreStudentRequest $request)
        {
            $data = $request->validated();
        
            // Auto-generate NIS seperti SIS-2025-0001
            $lastId = Student::max('id') + 1;
            $data['nis'] = 'SIS-' . date('Y') . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
        
            Student::create($data);
        
            return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan!');
        }
        

        public function show(Student $student)
        {
            return view('students.show', compact('student'));
        }

        public function edit(Student $student)
        {
            return view('students.edit', compact('student'));
        }

        public function update(UpdateStudentRequest $request, Student $student)
        {
            $student->update($request->validated());
            return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui!');
        }

        public function destroy(Student $student)
        {
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus!');
        }

        public function search(Request $request)
        {
            $search = $request->input('search');
        
            $students = Student::where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('nis', 'like', "%{$search}%")
                ->paginate(10);
        
            return view('students.index', compact('students', 'search'));
        }
    }
