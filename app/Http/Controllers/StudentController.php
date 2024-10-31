<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

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
        return redirect()->route('studentsinfo');
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
        return redirect()->route('studentsinfo');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('studentsinfo');
    }
}