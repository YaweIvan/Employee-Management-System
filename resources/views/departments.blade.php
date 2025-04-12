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
    
     <style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    }
    
    .btn {
        border-radius: 5px;
        padding: 8px 16px;
        transition: all 0.3s;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
     
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
    
    <!-- Department Cards Section -->
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Department Management</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Departments</li>
                </ol>
            </nav>
        </div>
        
        <div class="row g-4">
            <!-- Add Department Card -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex p-0">
                        <div class="bg-primary text-white p-4 d-flex align-items-center justify-content-center" style="width: 100px;">
                            <i class="fas fa-plus-circle fa-2x"></i>
                        </div>
                        <div class="p-4">
                            <h5 class="card-title">Add Department</h5>
                            <p class="card-text text-muted">Create a new department to be managed in the system.</p>
                            <a href="{{ route('admin.create_department') }}" class="btn btn-primary">Create Department</a>

                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Manage Departments Card -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex p-0">
                        <div class="bg-success text-white p-4 d-flex align-items-center justify-content-center" style="width: 100px;">
                            <i class="fas fa-cog fa-2x"></i>
                        </div>
                        <div class="p-4">
                            <h5 class="card-title">Manage Departments</h5>
                            <p class="card-text text-muted">View, edit or remove existing departments from the system.</p>
                            <a href="{{ route('admin.manage_department') }}" class="btn btn-primary">Manage Department</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
    <h3 class="mb-4"> Departments</h3>

    <table class="table table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Department Name</th>
            <th>Short Form</th>
            <th>Code</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Human Resources</td>
            <td>HR</td>
            <td>HR001</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Finance</td>
            <td>FIN</td>
            <td>FIN002</td>
        </tr>
        <tr>
            <td>3</td>
            <td>IT Support</td>
            <td>IT</td>
            <td>IT003</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Operations</td>
            <td>OPS</td>
            <td>OPS004</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Marketing</td>
            <td>MKT</td>
            <td>MKT005</td>
        </tr>
    </tbody>
</table>

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