<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/admin/create-department', function () {
    return view('createdepartment');
})->name('admin.create_department');

Route::get('/admin/manage-department', function () {
    return view('managedepartment');
})->name('admin.manage_department');





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

Route::get('/admin/add-leave', function () {
    return view('addleave');
})->name('admin.addleave');


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


