<?php
use App\Http\Controllers\EmployeeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\Auth\EmployeeAuthController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return view('welcome');
});

// Show login form and login
Route::get('/employee/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login');
Route::post('/employee/login', [EmployeeAuthController::class, 'login'])->name('employee.login.submit');
Route::get('/employee/dashboard', [EmployeeAuthController::class, 'dashboard'])->name('employee.dashboard');


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

// Route::get('/admin/add-employee', function () {
//     return view('addemployee');
// })->name('admin.add_employee');
Route::get('/admin/add-employee', [EmployeeController::class, 'create'])->name('admin.add_employee');
Route::post('/admin/add-employee', [EmployeeController::class, 'store'])->name('admin.store_employee');


//manageemployee
// Route::get('/admin/manage-employee', function () {
//     return view('manageemployee');
// })->name('admin.manageemployee');
Route::get('/admin/manage-employee', [EmployeeController::class, 'index'])->name('admin.manageemployee');
// Edit an employee
Route::get('/admin/manage-employee/{id}/edit', [EmployeeController::class, 'edit'])->name('admin.employee.edit');

// Update an employee after editing
Route::put('/admin/manage-employee/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update');

// Delete an employee
Route::delete('/admin/manage-employee/{id}', [EmployeeController::class, 'destroy'])->name('admin.employee.delete');




// Salary Management
//Route::get('/admin/salary-management', function () {
   // return view('salary_management');
//})->name('admin.salary');


Route::get('/admin/salary-management', [SalaryController::class, 'index'])->name('admin.salary');





// Leave Types
// Route::get('/admin/leave-types', function () {
//     return view('leave_types');
// })->name('admin.leave_types');
Route::get('/admin/leave-types', [LeaveController::class, 'index'])->name('admin.leave_types');


// Leave Requests
// Route::get('/admin/leave-requests', function () {
//     return view('leave_requests');
// })->name('admin.leave_requests');


//addleave
Route::get('/admin/add-leave', function () {
    return view('addleave');
})->name('admin.addleave');
Route::post('/admin/store-leave', [LeaveController::class, 'storeLeaveType'])->name('admin.storeleave');



//editleave
// Route::get('/admin/edit-leave', function () {
//     return view('editleave');
// })->name('admin.editleave');
// Show edit form
Route::get('/admin/edit-leave/{id}', [LeaveController::class, 'edit'])->name('admin.editleave');

// Handle update (form submission)
Route::post('/admin/update-leave/{id}', [LeaveController::class, 'update'])->name('admin.updateleave');

// Handle delete
Route::delete('/admin/delete-leave/{id}', [LeaveController::class, 'destroy'])->name('admin.deleteleave');



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


//search employee
Route::get('/admin/employees/search', [EmployeeController::class, 'search'])->name('admin.search_employee');



//hillarries




Route::get('/employee/dashboard', function(){
    return view('partials.dashboard');
})->name('employee.dashboard');

Route::get('/employee/profile', function(){
    return view('partials.profile');
})->name('employee.profile');

Route::get('/employee/leave', function (){
    return view('partials.leave');
})->name('employee.leave');

Route::get('/employee/attendance', function(){
    return view('partials.attendance');
})->name('employee.attendance');

Route::get('/employee/logout', function(){
    Auth::logout();
    return redirect('login');
})->name('employee.logout');


//leave requets 
Route::get('/employee/leave', [LeaveRequestController::class, 'create'])->name('employee.leave');
Route::post('/employee/leave', [LeaveRequestController::class, 'store'])->name('employee.leave.store');

Route::get('/admin/leave-requests', [LeaveRequestController::class, 'index'])->name('admin.leave_requests');

Route::get('/salaries', [SalaryController::class, 'index'])->name('salaries.index');
Route::post('/salaries', [SalaryController::class, 'store'])->name('salaries.store');
