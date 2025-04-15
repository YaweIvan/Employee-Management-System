<?php
use App\Http\Controllers\EmployeeController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;



Route::get('/', function () {
    return view('welcome');
});

// Show login form
Route::get('/employee/login', function () {
    return view('employeelogin');
})->name('employee.login');

// Handle login form submission (to be created later)
Route::post('/employee/login', [App\Http\Controllers\EmployeeLoginController::class, 'login'])->name('employee.login.submit');

Route::get('/admin/admindashboard', function () {
    return view('admindashboard');
})->name('admindashboard');



// Admin Dashboard
Route::get('/admin/dashboard', function () {
    return view('admindashboard');
})->name('admin.dashboard');

// Departments
Route::get('/admin/departments', function () {
    return view('departments');
})->name('admin.departments');



// Route::get('/admin/create-department', function () {
//     return view('createdepartment');
// })->name('admin.create_department');
Route::get('/admin/create-department', [DepartmentController::class, 'create'])->name('admin.create_department');
Route::post('/admin/create-department', [DepartmentController::class, 'store'])->name('admin.store_department');



// Route::get('/admin/manage-department', function () {
//     return view('managedepartment');
// })->name('admin.manage_department');
Route::get('/admin/manage-department', [DepartmentController::class, 'index'])->name('admin.manage_department');

//edit and delete
Route::get('/admin/edit-department/{id}', [DepartmentController::class, 'edit'])->name('admin.edit_department');
Route::post('/admin/update-department/{id}', [DepartmentController::class, 'update'])->name('admin.update_department');
Route::delete('/admin/delete-department/{id}', [DepartmentController::class, 'destroy'])->name('admin.delete_department');



// Employees
Route::get('/admin/employees', function () {
    return view('employees');
})->name('admin.employees');

Route::get('/admin/add-employee', function () {
    return view('addemployee');
})->name('admin.add_employee');

//manageemployee
Route::get('/admin/manage-employee', function () {
    return view('manageemployee');
})->name('admin.manageemployee');


// Salary Management
Route::get('/admin/salary-management', function () {
    return view('salary_management');
})->name('admin.salary');


// Leave Types
Route::get('/admin/leave-types', function () {
    return view('leave_types');
})->name('admin.leave_types');
// Leave Requests
Route::get('/admin/leave-requests', function () {
    return view('leave_requests');
})->name('admin.leave_requests');
//addleave
Route::get('/admin/add-leave', function () {
    return view('addleave');
})->name('admin.addleave');
//editleave
Route::get('/admin/edit-leave', function () {
    return view('editleave');
})->name('admin.editleave');


// Reports
Route::get('/admin/reports', function () {
    return view('reports');
})->name('admin.reports');

// Notifications
Route::get('/admin/notifications', function () {
    return view('notifications');
})->name('admin.notifications');

// Settings (can be modal view or a full page)
Route::get('/admin/settings', function () {
    return view('settings');
})->name('admin.settings');




//hillarries




// // Employee Dashboard Routes
// Route::middleware('auth')->group(function () {
//     // Dashboard Section
//     Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

//     // Profile Section
//     Route::get('/profile', [EmployeeController::class, 'profile'])->name('employee.profile');
//     Route::post('/profile/update', [EmployeeController::class, 'updateProfile'])->name('employee.profile.update');

//     // Leave Section
//     Route::get('/leave', [EmployeeController::class, 'leave'])->name('employee.leave');
//     Route::post('/leave/apply', [EmployeeController::class, 'applyLeave'])->name('employee.leave.apply');
//     Route::get('/leave/details', [EmployeeController::class, 'leaveDetails'])->name('employee.leave.details');

//     // Attendance Section
//     Route::get('/attendance', [EmployeeController::class, 'attendance'])->name('employee.attendance');

//     // Logout Route
//     Route::post('/logout', [EmployeeController::class, 'logout'])->name('logout');
// });


Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

    // Profile Section
    Route::get('/profile', [EmployeeController::class, 'profile'])->name('employee.profile');
    Route::post('/profile/update', [EmployeeController::class, 'updateProfile'])->name('employee.profile.update');

    // Leave Section
    Route::get('/leave', [EmployeeController::class, 'leave'])->name('employee.leave');
    Route::post('/leave/apply', [EmployeeController::class, 'applyLeave'])->name('employee.leave.apply');
    Route::get('/leave/details', [EmployeeController::class, 'leaveDetails'])->name('employee.leave.details');

    // Attendance Section
    Route::get('/attendance', [EmployeeController::class, 'attendance'])->name('employee.attendance');

    // Logout Route
    Route::post('/logout', [EmployeeController::class, 'logout'])->name('logout');