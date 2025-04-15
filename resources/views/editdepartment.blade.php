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
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .notification-section {
        display: grid;
        gap: 30px;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }

    .notification-card {
        border: none;
        border-radius: 15px;
        background-color: #ffffff;
        transition: transform 0.3s ease-in-out;
        padding: 20px;
    }

    .notification-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 20px;
    }

    .notification-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding: 10px 0;
        border-bottom: 1px solid #eaeaea;
    }

    .fw-bold {
        font-weight: 600;
    }

    .badge-custom {
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 1rem;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-warning {
        background-color: #ffc107;
    }

    .badge-info {
        background-color: #17a2b8;
    }

    .badge-danger {
        background-color: #dc3545;
    }

    .badge-primary {
        background-color: #007bff;
    }

    .badge-secondary {
        background-color: #6c757d;
    }

    footer {
        background-color: #f1f3f5;
        padding: 15px 0;
        color: #6c757d;
    }

    footer p {
        margin: 0;
        font-size: 0.9rem;
    }

    .text-primary {
        color: #0d6efd;
    }

    /* Dark Theme Overrides */
  html[data-bs-theme="dark"] {
    background-color: #121212;
    color: #e0e0e0;
  }

  html[data-bs-theme="dark"] .notification-card {
    background-color: #1e1e1e;
    color: #e0e0e0;
  }

  html[data-bs-theme="dark"] .notification-item {
    border-bottom: 1px solid #333;
  }

  html[data-bs-theme="dark"] .card-title {
    color: #90caf9;
  }

  html[data-bs-theme="dark"] footer {
    background-color: #1a1a1a;
    color: #aaa;
  }

  html[data-bs-theme="dark"] .badge-custom.bg-success {
    background-color: #2e7d32;
  }

  html[data-bs-theme="dark"] .badge-custom.bg-warning {
    background-color: #ffb300;
  }

  html[data-bs-theme="dark"] .badge-custom.bg-info {
    background-color: #0288d1;
  }

  html[data-bs-theme="dark"] .badge-custom.bg-danger {
    background-color: #c62828;
  }

  html[data-bs-theme="dark"] .badge-custom.bg-primary {
    background-color: #1976d2;
  }

  html[data-bs-theme="dark"] .badge-custom.bg-secondary {
    background-color: #757575;
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

    <!-- Main Content -->
    <div class="container py-5">
    <!-- Page Title -->
    <h2 class="mb-4 text-center text-primary">Edit Department</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-body">
                    <form action="{{ route('admin.update_department', $department->id) }}" method="POST">
                        @csrf
                        @method('POST') {{-- If you later use PUT, change this to @method('PUT') --}}

                        <div class="mb-3">
                            <label class="form-label fw-bold">Department Name</label>
                            <input type="text" name="department_name" class="form-control" value="{{ $department->department_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Shortform</label>
                            <input type="text" name="shortform" class="form-control" value="{{ $department->shortform }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Department Code</label>
                            <input type="text" name="department_code" class="form-control" value="{{ $department->department_code }}" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-save me-2"></i>Update Department
                            </button>
                        </div>
                    </form>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>




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