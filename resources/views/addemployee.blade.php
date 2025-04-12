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
    /* Page Container */
    #content {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-section {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .card-section h5 {
        margin-bottom: 20px;
        color: #0d6efd;
        font-weight: bold;
        border-bottom: 2px solid #0d6efd;
        padding-bottom: 5px;
    }

    .form-label {
        font-weight: 500;
    }

    .btn-lg {
        padding: 10px 30px;
        font-size: 1.1rem;
        border-radius: 10px;
    }

    .form-control {
        border-radius: 10px;
    }

    html[data-bs-theme='dark'] {
    background-color: #121212;
    color: #ffffff;
}

html[data-bs-theme='dark'] .form-control {
    background-color: #1e1e1e;
    color: #ffffff;
    border-color: #444;
}

html[data-bs-theme='dark'] .form-control::placeholder {
    color: #cccccc;
}

html[data-bs-theme='dark'] .form-label {
    color: #f1f1f1;
}

html[data-bs-theme='dark'] .card-section {
    background-color: #1f1f1f;
    border-color: #333;
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.05);
}

html[data-bs-theme='dark'] #content {
    background-color: #1c1c1c;
    color: #ffffff;
}

html[data-bs-theme='dark'] .btn-success,
html[data-bs-theme='dark'] .btn-danger {
    color: #fff;
    border: none;
}

html[data-bs-theme='dark'] .btn-success:hover,
html[data-bs-theme='dark'] .btn-danger:hover {
    filter: brightness(1.1);
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

    <form method="POST" action="#">
        @csrf

        <!-- === Bio Data === -->
        <div class="card-section">
            <h5>Employee Bio Data</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter Full Name">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Employee ID</label>
                    <input type="text" class="form-control" value="EMP1032" readonly>
                </div>
            </div>
        </div>

        <!-- === Address === -->
        <div class="card-section">
            <h5>Address Information</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" placeholder="Enter City">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">District</label>
                    <input type="text" class="form-control" placeholder="Enter District">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Full Address</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Full Address"></textarea>
                </div>
            </div>
        </div>

        <!-- === Department & Role === -->
        <div class="card-section">
            <h5>Department & Role</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>
                    <input type="text" class="form-control" placeholder="Enter Department">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Role/Position</label>
                    <input type="text" class="form-control" placeholder="Enter Role">
                </div>
            </div>
        </div>

        <!-- === Buttons === -->
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg me-3">Add Employee</button>
            <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
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