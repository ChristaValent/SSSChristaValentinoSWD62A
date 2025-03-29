<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //show all students
    public function index()
    {
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');

        if(request('college_id'))
        {
            $students = Student::where('college_id', request('college_id'))->orderBy('name')->get();
        }
        else
        {
            $students = Student::all();
        }

        return view('students.index', compact('students', 'colleges'));
    }

    //create a new student
    public function create()
    {
        $students = new Student();
        $colleges = College::orderBy('name')->pluck('name', 'id');
        return view('students.create', compact('students', 'colleges'));
    }

    //store the new student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email', // Email validation and also check that email has not been previously used
            'phone' => 'required|regex:/^\d{8}$/', // Phone number validation with regex to make sure it's 8 digits
            'dob' => 'required',
            'college_id' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    //show a specific student
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    //display edit form
    public function edit($id)
    {
        $student = Student::find($id);
        $colleges = College::orderBy('name')->pluck('name', 'id');
        return view('students.edit', compact('student', 'colleges'));
    }

    //update the student
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$id, // Email validation and also check that email has not been previously used
            'phone' => 'required|regex:/^\d{8}$/', // Phone number validation with regex to make sure it's 8 digits
            'dob' => 'required',
            'college_id' => 'required|exists:colleges,id', // check that the college_id exists in the colleges table
        ]);

        $student = Student::find($id); //find the student
        $student->update($request->all()); 
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    //delete the student
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
