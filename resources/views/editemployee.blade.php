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
    .form-label {
        font-weight: 500;
    }

    .form-control, .form-select {
        border-radius: 10px;
    }

    .btn {
        border-radius: 10px;
    }

    /* Custom Styling for the form  */
    .form-group label {
        font-weight: bold;
        font-size: 1.1rem;
    }

    .form-control {
        border-radius: 0.5rem;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .form-control-lg {
        font-size: 1rem;
        padding: 1.25rem;
    }

    .btn-lg {
        padding: 0.75rem 2rem;
        font-size: 1.2rem;
    }

    .btn-primary {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-primary:hover {
        background-color: #004085;
        border-color: #003366;
    }

    .card {
        border-radius: 1rem;
        background-color: #f9f9f9;
    }

    .card h3 {
        font-size: 1.8rem;
        color: #333;
    }

    /* Input focus effect */
    .form-control:focus {
        border-color: #0056b3;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    /* Center form on small screens */
    .container {
        max-width: 800px;
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

    <!-- Table Container -->
    <div class="container mt-4">
    <form method="POST" action="{{ route('admin.employee.update', $employee->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card shadow-sm p-4 mb-4">
            <h3 class="mb-4 text-center">Edit Employee</h3>

            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name', $employee->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email', $employee->email) }}" required>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control form-control-lg" name="phone" value="{{ old('phone', $employee->phone) }}" required>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control form-control-lg" accept="image/*">
            </div>

            <div class="form-group">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control form-control-lg" name="city" value="{{ old('city', $employee->city) }}" required>
            </div>

            <div class="form-group">
                <label for="district" class="form-label">District</label>
                <input type="text" class="form-control form-control-lg" name="district" value="{{ old('district', $employee->district) }}" required>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control form-control-lg" name="address" required>{{ old('address', $employee->address) }}</textarea>
            </div>

            <div class="form-group">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control form-control-lg" name="department" value="{{ old('department', $employee->department) }}" required>
            </div>

            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control form-control-lg" name="role" value="{{ old('role', $employee->role) }}" required>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Update Employee</button>
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