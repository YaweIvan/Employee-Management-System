<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;

class EmployeeAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('employeelogin');
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'username' => 'required|email',
            'employee_number' => 'required'
        ]);

        // Attempt to find the employee by email and employee number
        $employee = Employee::where('email', $request->username)
                            ->where('employee_id', $request->employee_number)
                            ->first();

        // If the employee exists, log them in and store their information in the session
        if ($employee) {
            session([
                'employee_logged_in' => true,
                'employee' => $employee // Store employee details in the session
            ]);
            return redirect()->route('employee.dashboard');
        } else {
            return back()->with('error', 'Invalid credentials.');
        }
    }

    public function dashboard()
    {
        // Check if the employee is logged in (session value 'employee_logged_in' should be true)
        if (!session('employee_logged_in')) {
            return redirect()->route('employee.login')->with('error', 'Please log in.');
        }

        // Retrieve the logged-in employee from the session
        $employee = session('employee');

        // Return the dashboard view with the employee data
        return view('employee.dashboard', compact('employee'));
    }

    public function logout()
    {
        // Log the employee out by clearing the session data
        session()->forget(['employee_logged_in', 'employee']);
        return redirect()->route('employee.login')->with('success', 'Logged out successfully.');
    }
}
