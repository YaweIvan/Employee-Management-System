<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function create()
    {
        return view('createdepartment');
    }

    public function store(Request $request)
    {
        // 1. Validate the form
        $validated = $request->validate([
            'department_name' => 'required|string|max:255',
            'shortform' => 'required|string|max:50',
            'department_code' => 'required|string|max:50',
        ]);

        // 2. Save to the database
        Department::create($validated);

        // 3. Show success message
        return redirect()->back()->with('success', 'Department added successfully!');
    }

     // function method for displaying data
     public function index()
     {
         $departments = Department::all(); // Get all departments from the database
         return view('managedepartment', compact('departments'));
     }

    //function to delete
     public function destroy($id)
{
    $department = Department::findOrFail($id);
    $department->delete();

    return redirect()->route('admin.manage_department')->with('success', 'Department deleted successfully!');
}


     //  functiom Show the edit form
public function edit($id)
{
    $department = Department::findOrFail($id); // find or fail if not found
    return view('editdepartment', compact('department'));
}

// fuction Handle form submission
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'department_name' => 'required|string|max:255',
        'shortform' => 'required|string|max:50',
        'department_code' => 'required|string|max:50',
    ]);

    $department = Department::findOrFail($id);
    $department->update($validated);

    return redirect()->route('admin.manage_department')->with('success', 'Department updated successfully!');
}

}