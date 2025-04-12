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
    border-radius: 1rem;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-weight: bold;
    font-size: 1.25rem;
}

.card-text {
    color: #6c757d;
}

.card .btn {
    border-radius: 50px;
    padding: 10px 25px;
    font-weight: 500;
}

.card-body i {
    transition: transform 0.3s ease;
}

.card:hover i {
    transform: scale(1.2);
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
    
    <div class="container mt-4">
    <div class="row g-4">
        <!-- Add Employee Card -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Add Employee</h5>
                    <p class="card-text">Register a new employee into the system.</p>
                    <a href="{{ route('admin.add_employee') }}" class="btn btn-primary">Add Now</a>
                   
                </div>
            </div>
        </div>

        <!-- Manage Employees Card -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <i class="fas fa-users-cog fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Manage Employees</h5>
                    <p class="card-text">Edit or view registered employees.</p>
                    <a href="/admin/Manage_employee" class="btn btn-success">Manage</a>
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