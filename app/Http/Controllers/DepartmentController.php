<?php



namespace App\Http\Controllers;



use App\Models\Department;

use Illuminate\Http\Request;

use App\Policies\DepartmentPolicy;


class DepartmentController extends Controller

{


    public function index()

    {

        $departments = Department::all();

        return view('departments.index', compact('departments'));
    }



    public function create()

    {

        return view('departments.create');
    }



    public function store(Request $request)

    {

        $this->validate($request, [

            'name' => 'required|string|unique:departments,name',

            'department_code' => 'required|string|unique:departments,department_code',

        ]);



        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department created successfully!'); // Success message on creation

    }




    public function edit(Department $department)

    {

        return view('departments.edit', compact('department'));
    }





    public function update(Request $request, Department $department)

    {





        $this->validate($request, [

            'name' => 'required|string',

            'department_code' => 'required|string',

        ]);



        $updateData = $request->all();





        $isNameChanged = $department->name !== $updateData['name'];

        $isDeptCodeChanged = $department->department_code !== $updateData['department_code'];




        if ($isNameChanged || $isDeptCodeChanged) {

            $validationRule = [

                'name' => 'required|string|unique:departments,name,' . $department->id,

                'department_code' => 'required|string|unique:departments,department_code,' . $department->id,

            ];



            $this->validate($request, $validationRule);
        }



        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully!'); // Success message on update

    }



    public function show(Department $department)

    {

        return view('departments.show', compact('department'));
    }



    public function destroy(Department $department)

    {

        try {

            $department->delete();

            return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
        } catch (\Exception $e) {

            return redirect()->route('departments.index')->with('error', 'Error deleting department: Already selected department is in use');
        }
    }
}
