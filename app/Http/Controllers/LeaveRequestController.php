<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeaveRequestController extends Controller
{
    public function create()
    {
        $leaveTypes = Leave::all();  // Fetch available leave types
        return view('partials.leave', compact('leaveTypes'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'leave_type_id' => 'required|exists:leaves,id',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        // Get the logged-in employee from the session
        $employee = session('employee');

        if (!$employee) {
            return back()->with('error', 'Employee not logged in or session expired.');
        }

        // Parse and format the dates correctly
        $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
        $toDate = Carbon::parse($request->to_date)->format('Y-m-d');

        // Create the leave request
        LeaveRequest::create([
            'employee_id' => $employee->id,
            'leave_type_id' => $request->leave_type_id,
            'from_date' => $fromDate,
            'to_date' => $toDate,
            'submitted_on' => now(),
            'status' => 'Pending',
        ]);

        return back()->with('success', 'Leave request created successfully.');
    }

    public function index()
    {
        // Fetch all leave requests with the associated employee and leave type data
        $leaveRequests = LeaveRequest::with('employee', 'leaveType')->get();
        
        // Pass leaveRequests to the view
        return view('leave_requests', compact('leaveRequests'));
    }

    
}
