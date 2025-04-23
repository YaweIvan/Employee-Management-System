<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // Fetch the logged-in employee (you can use session or auth depending on your setup)
        $employee = session('employee');  // Assuming you're storing employee data in the session

        // Fetch all leave requests for this employee
        $leaveRequests = LeaveRequest::where('employee_id', $employee->id)
                                      ->orderBy('submitted_on', 'desc')
                                      ->get();

        return view('partials.profile', compact('employee', 'leaveRequests'));
    }
}
