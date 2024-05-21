<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    
    public function index()
    {
       $students = Student::all();
       Return view('students.index', compact('students'));

       //return view('students.index')-> with('students', $students);
    }

    
    public function create()
    {
        return view('students.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|integer|min:1',
        ]);

        Student::create($request->all());


        return redirect() -> route('students.index');
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $student = Student::findorFail($id);

        return view('students.edit', compact('student'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|integer|min:1',
        ]);

        $student = Student::findorFail($id);

        $student ->update($request->all());


        return redirect() -> route('students.index');
    
    }

    
    public function destroy(string $id)
    {
        $student = Student::FindorFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}
