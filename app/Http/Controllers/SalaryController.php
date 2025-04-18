<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee; // To fetch employees

class SalaryController extends Controller
{
    // Show all salary records
    public function index()
    {
        // Eager load the 'employee' relationship to fetch employee details along with salary records
        $salaries = Salary::with('employee')->get();  // Load the employee relationship
        $employees = Employee::all(); // Fetch all employees for the dropdown

        return view('salary_management', compact('salaries', 'employees'));  // Pass employees to view
    }

    // Store salary record
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id', // Validates employee_id
            'pay_period' => 'required|string',
            'basic_salary' => 'required|numeric',
            'allowances' => 'nullable|numeric', // Allowances can be nullable
        ]);

        // Calculate net pay
        $validated['net_pay'] = $validated['basic_salary'] + ($validated['allowances'] ?? 0);

        // Create a new salary record
        Salary::create([
            'employee_id' => $validated['employee_id'],
            'pay_period' => $validated['pay_period'],
            'basic_salary' => $validated['basic_salary'],
            'allowances' => $validated['allowances'] ?? 0,
            'net_pay' => $validated['net_pay'],
        ]);

        // Redirect with success message
        return redirect()->route('salaries.index')->with('success', 'Salary record added successfully!');
    }
}
