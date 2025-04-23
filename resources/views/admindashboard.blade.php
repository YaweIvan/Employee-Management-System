<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee MS Dashboard</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
     <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>
<body>

<!-- Sidebar -->
@include('sidebar')
    <a href="#" data-bs-toggle="modal" data-bs-target="#settingsModal"><i class="fas fa-cog me-2"></i> Settings</a>
</div>

<!-- Main Content -->
<div class="content" id="content">
    <!-- Top Bar -->
   @include('topbar')

    <!-- Overview Cards -->
    <div class="row g-3">
    <!-- Registered Employees Card -->
    <div class="col-md-4 col-sm-6">
        <div class="card text-white bg-success h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">REGISTERED EMPLOYEES</h6>
                    <h4>{{ $employeeCount }}</h4> <!-- Dynamically display the employee count -->
                </div>
                <i class="fas fa-users card-icon"></i>
            </div>
            <div class="card-footer bg-transparent border-0">
                <small><i class="fas fa-arrow-up me-1"></i> 1 new this month</small>
            </div>
            <a href="{{ route('admin.manageemployee') }}" class="stretched-link"></a> <!-- Link to Employee List -->
        </div>
    </div>

    <!-- Listed Departments Card -->
    <div class="col-md-4 col-sm-6">
        <div class="card text-white bg-warning h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">LISTED DEPARTMENTS</h6>
                    <h4>{{ $departmentCount }}</h4>
                </div>
                <i class="fas fa-building card-icon"></i>
            </div>
            <div class="card-footer bg-transparent border-0">
                <small>IT, HR, Finance, Marketing</small>
            </div>
            <a href="{{ route('admin.manage_department') }}" class="stretched-link"></a> <!-- Link to Departments -->
        </div>
    </div>

    <!-- Listed Leave Types Card -->
    <div class="col-md-4 col-sm-6">
        <div class="card text-white bg-danger h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">LISTED LEAVE TYPES</h6>
                    <h4>{{ $leaveCount }}</h4>
                </div>
                <i class="fas fa-star card-icon"></i>
            </div>
            <div class="card-footer bg-transparent border-0">
                <small>Sick Leave, Vacation</small>
            </div>
            <a href="{{ route('admin.leave_types') }}" class="stretched-link"></a> <!-- Link to Leave Types -->
        </div>
    </div>
</div>


    <!-- Quick Access Section -->
    <div class="card mt-4">
    <div class="card-header bg-transparent">
        <h5 class="mb-0">Quick Actions</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <!-- Add New Employee -->
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 text-center">
                    <a href="{{ route('admin.add_employee') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-user-plus text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Add New Employee</h6>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Generate Payslips (you can link it to your salary management or similar) -->
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 text-center">
                    <a href="{{ route('admin.salary') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="rounded-circle bg-success bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-file-invoice text-success" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Generate Payslips</h6>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Approve Leaves -->
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 text-center">
                    <a href="{{ route('admin.leave_requests') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-calendar-check text-warning" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Approve Leaves</h6>
                        </div>
                    </a>
                </div>
            </div>

            <!-- View Reports -->
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 text-center">
                    <a href="{{ route('admin.reports') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="rounded-circle bg-info bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-chart-pie text-info" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>View Reports</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Footer -->
    <footer class="mt-4 text-center">
        <p>© 2025 Employee Management System. All rights reserved.</p>
    </footer>
</div>


               
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Toggle sidebar on mobile
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });

    // Profile dropdown toggle
    document.getElementById('profilePic').addEventListener('click', function() {
        document.getElementById('profileMenu').classList.toggle('show');
    });

    // Close profile dropdown when clicking elsewhere
    window.addEventListener('click', function(e) {
        if (!document.getElementById('profilePic').contains(e.target)) {
            const profileMenu = document.getElementById('profileMenu');
            if (profileMenu.classList.contains('show')) {
                profileMenu.classList.remove('show');
            }
        }
    });

    // Dark mode toggle functionality
    document.getElementById('themeSwitch').addEventListener('click', function() {
        const html = document.documentElement;
        const themeIcon = this.querySelector('i');
        
        if (html.getAttribute('data-bs-theme') === 'dark') {
            html.setAttribute('data-bs-theme', 'light');
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        } else {
            html.setAttribute('data-bs-theme', 'dark');
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        }
    });

    // Sync settings modal with theme
    const darkModeSwitch = document.getElementById('darkModeSwitch');
    darkModeSwitch.addEventListener('change', function() {
        const html = document.documentElement;
        const themeIcon = document.querySelector('#themeSwitch i');
        
        if (this.checked) {
            html.setAttribute('data-bs-theme', 'dark');
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        } else {
            html.setAttribute('data-bs-theme', 'light');
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        }
    });

    // Update darkModeSwitch when modal is opened
    const settingsModal = document.getElementById('settingsModal');
    settingsModal.addEventListener('show.bs.modal', function () {
        darkModeSwitch.checked = document.documentElement.getAttribute('data-bs-theme') === 'dark';
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            document.getElementById('sidebar').classList.remove('show');
        }
    });
</script>
</body>
</html>