<style>
    #sidebar {
        height: 100vh;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch; /* Enables smooth scrolling on iOS */
        scrollbar-width: none; /* Firefox */
        padding-bottom: 2rem; /* Add padding to prevent last item being cut off */
        scroll-behavior: smooth;
    }

    #sidebar::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Edge */
    }
</style>


<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h4 class="text-center mb-0">Employee MS</h4>
    </div>
    <div class="px-3 mb-4 text-center">
        <img src="{{ asset('images/bossminions.png') }}" alt="Admin" class="rounded-circle mb-2" style="width: 30px; height: 30px; object-fit: cover;">
        <h6 class="mb-0">Admin User</h6>
        <small>System Administrator</small>
    </div>

    <a href="{{ route('admin.dashboards') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
    </a>

    <a href="{{ route('admin.departments') }}" 
       class="{{ request()->routeIs('admin.departments') || request()->routeIs('admin.create_department')|| request()->routeIs('admin.manage_department') ? 'active' : '' }}">
       <i class="fas fa-building me-2"></i> Departments
    </a>

    <a href="{{ route('admin.leave_types') }}" class="{{ request()->routeIs('admin.leave_types') || request()->routeIs('admin.addleave') || request()->routeIs('admin.editleave') ? 'active' : '' }}">
        <i class="fas fa-suitcase me-2"></i> Leave Types
    </a>

    <a href="{{ route('admin.employees') }}" class="{{ request()->routeIs('admin.employees') || request()->routeIs('admin.add_employee')|| request()->routeIs('admin.manageemployee') || request()->routeIs('admin.employee.edit') ? 'active' : '' }}">
        <i class="fas fa-users me-2"></i> Employees
    </a>

    <a href="{{ route('admin.salary') }}" class="{{ request()->routeIs('admin.salary') ? 'active' : '' }}">
        <i class="fas fa-money-bill me-2"></i> Salary Management
    </a>

    <a href="{{ route('admin.leave_requests') }}" class="{{ request()->routeIs('admin.leave_requests') ? 'active' : '' }}">
        <i class="fas fa-file-alt me-2"></i> Leave Requests
        <span class="badge bg-warning text-dark float-end"></span>
    </a>

    <a href="{{ route('admin.reports') }}" class="{{ request()->routeIs('admin.reports') ? 'active' : '' }}">
        <i class="fas fa-chart-line me-2"></i> Reports
    </a>
</div>
