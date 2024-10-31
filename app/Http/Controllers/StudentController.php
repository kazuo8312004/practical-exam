<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('studentsinfo', compact('students'));
    }

    public function create()
    {
        return view('createinfo');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string|required',
            'email' => 'string|email|unique:students,email|required',
            'course' => 'string|required',
            'year' => 'integer|required'
        ]);

        Student::create($validatedData);
        return redirect()->route('students.view');
    }

    public function show(Student $student)
    {
        return view('viewinfo', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('updateinfo', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'string|required',
            'email' => 'string|email|required',
            'course' => 'string|required',
            'year' => 'integer|required'
        ]);

        $student->update($validatedData);
        return redirect()->route('students.view');
    }

    public function destroy(Student $student)
{
    $student->delete();

    // Fetch all students and reorder IDs
    $students = Student::orderBy('id')->get();
    $id = 1;
    foreach ($students as $student) {
        $student->id = $id;
        $student->save();
        $id++;
    }

    // Reset the AUTO_INCREMENT value to the next ID
    DB::statement('ALTER TABLE students AUTO_INCREMENT = ' . ($id));

    return redirect()->route('students.view');
}

}
