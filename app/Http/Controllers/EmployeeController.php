<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $user = (object) [
            'name' => 'Guest User',
            'profile_image' => null, // You can set a default image path here
            'emp_id' => 'EMP/001', // Default employee ID
        ];

        return view('employee', [
            'section' => 'dashboard',
            'user' => $user,
            'date' => now()->format('D, d M Y'),
        ]);
    }

    public function profile()
    {
        $user = (object) [
            'name' => 'Guest User',
            'profile_image' => null, // Default profile image
            'emp_id' => 'EMP/001', // Default employee ID
        ];

        return view('employee', [
            'section' => 'profile',
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Logic to update profile
    }

    public function leave()
    {
        return view('employee', [
            'section' => 'leave',
        ]);
    }

    public function applyLeave(Request $request)
    {
        // Logic to apply for leave
    }

    public function leaveDetails()
    {
        return view('employee.leave_details');
    }

    public function attendance()
    {
        return view('employee', [
            'section' => 'attendance',
        ]);
    }

    public function logout()
    {
        // Logic to handle logout
    }

    // Show the form to add a new employee (GET)
    public function create()
    {
        return view('addemployee');
    }

    // Handle the form submission and save the employee (POST)
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'department' => 'required',
            'role' => 'required',
        ]);

        // Handle image upload if it exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employee_images', 'public');

        }

        // Create the new employee record
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'employee_id' => 'EMP' . rand(1000, 9999), // Generate a random employee ID
            'image' => $imagePath,
            'city' => $request->city,
            'district' => $request->district,
            'address' => $request->address,
            'department' => $request->department,
            'role' => $request->role,
        ]);
        // Redirect with a success message
        return redirect()->route('admin.add_employee')->with('success', 'Employee added successfully!');
    }
     //showing manageemployee view
    public function index()
    {
        $employees = Employee::all();
        return view('manageemployee', compact('employees'));
    }


    //search 
    public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $employees = Employee::where('name', 'LIKE', "%{$searchTerm}%")
                ->orWhere('employee_id', 'LIKE', "%{$searchTerm}%")
                ->get();

    return view('manageemployee', compact('employees'));
}

// display edit form for employees
public function edit($id)
{
    $employee = Employee::findOrFail($id);
    return view('editemployee', compact('employee'));
}


//update employee details
public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);

    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email,' . $employee->id,
        'phone' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'city' => 'required',
        'district' => 'required',
        'address' => 'required',
        'department' => 'required',
        'role' => 'required',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('employee_images', 'public');
        $employee->image = $imagePath;
    }

    // Update employee details
    $employee->update($request->except('image')); // Exclude the image from direct mass assignment

    return redirect()->route('admin.manageemployee')->with('success', 'Employee updated successfully!');
}

//delete employee
public function destroy($id)
{
    $employee = Employee::findOrFail($id);
    $employee->delete();

    return redirect()->route('admin.manageemployee')->with('success', 'Employee deleted successfully!');
}




}
