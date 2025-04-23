<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    
    public function index()
    {
        // For now, just fetch the first employee in the database
        $employee = Employee::first();
    
        // Make sure you check if employee exists
        if (!$employee) {
            return redirect()->back()->with('error', 'No employee found.');
        }
    
        // Fetch their attendance records
        $attendances = Attendance::where('employee_id', $employee->id)
                            ->orderBy('attendance_date', 'desc')
                            ->get();
    
        return view('partials.attendance', compact('employee', 'attendances'));
    }
    

   

public function store(Request $request)
{
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'attendance_date' => 'required|date',
        'arrival_time' => 'nullable|date_format:H:i',
        'departure_time' => 'nullable|date_format:H:i',
        'status' => 'required|string'
    ]);

    // Convert the attendance date into the proper format (Y-m-d) for MySQL
    $attendance_date = Carbon::parse($request->attendance_date)->format('Y-m-d');

    // Create the attendance record
    Attendance::create([
        'employee_id' => $request->employee_id,
        'attendance_date' => $attendance_date,
        'arrival_time' => $request->arrival_time,
        'departure_time' => $request->departure_time,
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'Attendance recorded successfully!');
}

public function edit($id)
{
    $attendance = Attendance::findOrFail($id);
    return view('partials.attendance.edit', compact('attendance'));
}

public function destroy($id)
{
    $attendance = Attendance::findOrFail($id);
    $attendance->delete();

    return redirect()->route('employee.attendance')->with('success', 'Attendance deleted successfully!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'attendance_date' => 'required|date',
        'arrival_time' => 'nullable|date_format:H:i',
        'departure_time' => 'nullable|date_format:H:i',
        'status' => 'required|string'
    ]);

    $attendance = Attendance::findOrFail($id);
    $attendance->attendance_date = $request->attendance_date;
    $attendance->arrival_time = $request->arrival_time;
    $attendance->departure_time = $request->departure_time;
    $attendance->status = $request->status;
    $attendance->save();

    return redirect()->route('employee.attendance')->with('success', 'Attendance updated successfully!');
}


}
