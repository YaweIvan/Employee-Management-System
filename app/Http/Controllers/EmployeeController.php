<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}