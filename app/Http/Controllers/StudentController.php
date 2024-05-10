<?php


namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Student;

use App\Models\Department;


class StudentController extends Controller

{

    public function index()

    {

        $students = Student::with('department')->get();

        return view('students.index', compact('students'));
    }





    public function create()

    {

        $departments = Department::all();

        return view('students.create', compact('departments'));
    }





    public function store(Request $request)

    {

        $validatedData = $request->validate([

            'name' => 'required|string|max:255',

            'department_id' => 'required|integer|exists:departments,id',

            'roll_no' => 'required|string|unique:students,roll_no',

            'email' => 'required|string|max:255|unique:students,email',

        ]);



        $student = student::create($validatedData);



        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }




    public function show($id)

    {

        $student = Student::with('department')->findOrFail($id);

        return view('students.show', compact('student'));
    }




    public function edit($id)

    {

        $student = Student::with('department')->findOrFail($id);

        $departments = Department::all();

        return view('students.edit', compact('student', 'departments'));
    }







    public function update(Request $request, $id)

    {

        $validatedData = $request->validate([

            'name' => 'required|string|max:255',

            'department_id' => 'required|integer|exists:departments,id',

            'roll_no' => 'required|string|unique:students,roll_no,' . $id,

            'email' => 'required|string|max:255|unique:students,email,' . $id,

        ]);



        $student = student::findOrFail($id);

        $student->update($validatedData);



        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }




    public function destroy($id)

    {

        $student = Student::findOrFail($id);

        $student->delete();



        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
