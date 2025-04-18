<?php

namespace App\Http\Controllers;

use App\Models\Employee; // Import the Employee model
use App\Models\Department; // Import the Department model
use App\Models\Leave; // Import the Leave model
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the total number of registered employees
        $employeeCount = Employee::count();

        // Get the total number of departments
        $departmentCount = Department::count();

        // Get the total number of leave types
        $leaveCount = Leave::count();

        // Get the leave type names to display in the card footer
        $leaveNames = Leave::pluck('leave_name')->toArray();

        // Pass the data to the view
        return view('admindashboard', compact('employeeCount', 'departmentCount', 'leaveCount', 'leaveNames'));
    }
}
