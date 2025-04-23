<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveRequest;
use Carbon\Carbon;

class LeaveController extends Controller
{
    // Store leave types
    public function storeLeaveType(Request $request)
    {
        $validated = $request->validate([
            'leave_name' => 'required|string|max:255',
            'no_of_days' => 'required|integer|min:1',
            'status' => 'required|string|in:Active,Inactive,Pending',
        ]);

        Leave::create($validated);

        return redirect()->route('admin.addleave')->with('success', 'Leave added successfully!');
    }

    // Store leave request (used by employees)
    public function storeLeaveRequest(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leaves,id',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
        $toDate = Carbon::parse($request->to_date)->format('Y-m-d');

        $employee = session('employee');

        if (!$employee) {
            return back()->with('error', 'Employee not logged in or session expired.');
        }

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

    // Read all leave types
    public function index()
    {
        $leaves = Leave::all();
        return view('leave_types', compact('leaves'));
    }

    // Show edit form for leave type
    public function edit($id)
    {
        $leave = Leave::findOrFail($id);
        return view('editleavetype', compact('leave'));
    }

    // Update leave type
    public function update(Request $request, $id)
    {
        $request->validate([
            'leave_name' => 'required|string|max:255',
            'no_of_days' => 'required|integer|min:1',
            'status' => 'required|in:Active,Inactive,Pending',
        ]);

        $leave = Leave::findOrFail($id);
        $leave->update($request->only(['leave_name', 'no_of_days', 'status']));

        return redirect()->route('admin.leave_types')->with('success', 'Leave updated successfully.');
    }

    // Delete leave type
    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();

        return redirect()->route('admin.leave_types')->with('success', 'Leave deleted successfully.');
    }

    // Update leave request status
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Approved,Rejected,Pending', // ✅ include Pending
    ]);

    $leaveRequest = LeaveRequest::findOrFail($id);
    $leaveRequest->status = $request->status;
    $leaveRequest->save();

    return redirect()->back()->with('success', 'Leave request status updated successfully.');
}

    //delete leave 
    public function destroyLeave($id)
{
    $leaveRequest = LeaveRequest::findOrFail($id);
    $leaveRequest->delete();

    return redirect()->back()->with('success', 'Leave request deleted successfully.');
}

}
