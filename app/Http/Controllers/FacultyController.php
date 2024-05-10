<?php



namespace App\Http\Controllers;



use App\Models\Faculty;

use App\Models\Department;

use Illuminate\Http\Request;



class FacultyController extends Controller

{

    public function index()

    {


        $faculties = Faculty::with('department')->get();

        return view('faculties.index', compact('faculties'));
    }



    public function create()

    {

        $departments = Department::all();

        return view('faculties.create', compact('departments'));
    }

    public function store(Request $request)

    {

        $validatedData = $request->validate([

            'name' => 'required|string|max:255',

            'department_id' => 'required|integer|exists:departments,id',

            'faculty_id' => 'required|string|unique:faculties,faculty_id',

            'email' => 'required|string|max:255|unique:faculties,email',

        ]);



        $faculty = Faculty::create($validatedData);



        return redirect()->route('faculties.index')->with('success', 'Faculty added successfully!');
    }



    public function edit($id)

    {

        $faculty = Faculty::findOrFail($id);

        $departments = Department::all();

        return view('faculties.edit', compact('faculty', 'departments'));
    }



    public function update(Request $request, $id)

    {

        $validatedData = $request->validate([

            'name' => 'required|string|max:255',

            'department_id' => 'required|integer|exists:departments,id',

            'faculty_id' => 'required|string|unique:faculties,faculty_id,' . $id,

            'email' => 'required|string|max:255|unique:faculties,email,' . $id,

        ]);



        $faculty = Faculty::findOrFail($id);

        $faculty->update($validatedData);



        return redirect()->route('faculties.index')->with('success', 'Faculty updated successfully!');
    }



    public function show($id)

    {

        $faculty = faculty::with('department')->findOrFail($id);

        return view('faculties.show', compact('faculty'));
    }




    public function destroy($id)

    {

        $faculty = Faculty::findOrFail($id);

        $faculty->delete();

        return redirect()->route('faculties.index')->with('success', 'faculty deleted successfully!');
    }
}
