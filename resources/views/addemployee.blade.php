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
    /* Page Container */
    #content {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Form Title */
    h3 {
        font-family: 'Arial', sans-serif;
        color: #333;
        font-weight: bold;
    }

    /* Input Fields */
    .form-control {
        border-radius: 6px;
        padding: 12px;
        font-size: 1.1rem;
    }

    .form-control-lg {
        font-size: 1.2rem;
    }

    /* Form Button */
    .btn {
        border-radius: 6px;
        padding: 12px 25px;
        font-size: 1.1rem;
        transition: background-color 0.3s ease;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    /* Column Spacing */
    .row {
        margin-bottom: 15px;
    }

    /* Footer */
    footer p {
        color: #666;
        font-size: 0.9rem;
    }

    /* Adjustments for small screens */
    @media (max-width: 768px) {
        .form-control {
            font-size: 1rem;
        }
        
        .btn-lg {
            font-size: 1.1rem;
            padding: 10px 20px;
        }
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
    
    <a href="{{ route('admin.employees') }}" class="btn btn-success">
    <i class="fas fa-arrow-left"></i> Go Back
</a>
    <!-- Employee Form Section -->
    <div class="container mt-4">
        <h3 class="text-center mb-4">Add New Employee</h3>
        
        <!-- Employee Form -->
        <form method="POST" action="#">
            @csrf  <!-- Include CSRF token for Laravel form submission security -->
            
            <div class="row">
                <!-- Employee Name -->
                <div class="col-md-6 mb-3">
                    <label for="employee_name" class="form-label">Employee Name</label>
                    <input type="text" class="form-control form-control-lg" id="employee_name" name="employee_name" placeholder="Enter Employee Name" required>
                </div>
                
                <!-- Employee Email -->
                <div class="col-md-6 mb-3">
                    <label for="employee_email" class="form-label">Employee Email</label>
                    <input type="email" class="form-control form-control-lg" id="employee_email" name="employee_email" placeholder="Enter Employee Email" required>
                </div>
            </div>
            
            <div class="row">
                <!-- Employee Number -->
                <div class="col-md-6 mb-3">
                    <label for="employee_number" class="form-label">Employee Number</label>
                    <input type="text" class="form-control form-control-lg" id="employee_number" name="employee_number" placeholder="Enter Employee Number" required>
                </div>
                
                <!-- Department -->
                <div class="col-md-6 mb-3">
                    <label for="employee_department" class="form-label">Department</label>
                    <input type="text" class="form-control form-control-lg" id="employee_department" name="employee_department" placeholder="Enter Department" required>
                </div>
            </div>
            
            <div class="row">
                <!-- Submit Button -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success btn-lg">Add Employee</button>
                </div>
            </div>
        </form>
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