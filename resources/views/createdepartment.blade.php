<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee MS Dashboard</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
     <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    
     <style>
    /* General page padding */
.container {
    max-width: 700px;
}

/* Heading styling */
h2 {
    font-weight: bold;
    color: #333;
}

/* Card styling */
.card {
    border-radius: 12px;
    border: none;
    background-color: #f9f9f9;
}

/* Input field styling */
.form-control {
    border-radius: 8px;
    border: 1px solid #ccc;
}

/* Label styling */
.form-label {
    font-weight: 500;
    color: #555;
}

/* Button styling */
.btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Footer */
footer {
    margin-top: 50px;
    font-size: 0.9rem;
    color: #777;
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

  <!-- Go Back Button -->
  <a href="{{ route('admin.departments') }}" class="btn btn-success">
    <i class="fas fa-arrow-left"></i> Go Back
</a>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Add Department</h2>

    {{-- Success Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.store_department') }}" method="POST">
                @csrf {{-- For Laravel --}}
                
                <div class="mb-3">
                    <label for="deptName" class="form-label">Department Name</label>
                    <input type="text" class="form-control" id="deptName" name="department_name" placeholder="e.g. Human Resource">
                </div>

                <div class="mb-3">
                    <label for="shortForm" class="form-label">Shortform</label>
                    <input type="text" class="form-control" id="shortForm" name="shortform" placeholder="e.g. HR">
                </div>

                <div class="mb-3">
                    <label for="deptCode" class="form-label">Department Code</label>
                    <input type="text" class="form-control" id="deptCode" name="department_code" placeholder="e.g. HR001">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Department
                </button>
            </form>
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