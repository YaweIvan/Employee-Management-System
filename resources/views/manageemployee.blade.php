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

    /* Employee Table Styling */
.table th,
.table td {
    vertical-align: middle;
}

.table thead th {
    background-color: #007bff;
    color: #fff;
}

.btn-warning {
    font-weight: bold;
}

h4 {
    font-family: 'Segoe UI', sans-serif;
    font-weight: 600;
}

.container {
    max-width: 100%;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
}

.table-responsive {
    overflow-x: auto;
}

</style>
     
</head>
<body>

<!-- Sidebar -->


<!-- Main Content -->

    <!-- Top Bar -->
    @include('topbar')

    <a href="{{ route('admin.employees') }}" class="btn btn-success">
    <i class="fas fa-arrow-left"></i> Go Back
</a>
    
    <!-- Static Table of Employees -->
    <div class="container py-4">
        <h4 class="text-center mb-4">Employee Records</h4>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Employee ID</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>+1234567890</td>
                        <td>EMP1032</td>
                        <td>Kampala</td>
                        <td>Central</td>
                        <td>Plot 45, Main Street</td>
                        <td>IT</td>
                        <td>Software Developer</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>Sarah Kintu</td>
                        <td>sarah.kintu@example.com</td>
                        <td>+256778900123</td>
                        <td>EMP1045</td>
                        <td>Jinja</td>
                        <td>Eastern</td>
                        <td>Plot 17, Nile Avenue</td>
                        <td>HR</td>
                        <td>HR Manager</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>Peter Okello</td>
                        <td>peter.okello@example.com</td>
                        <td>+256701234567</td>
                        <td>EMP1090</td>
                        <td>Gulu</td>
                        <td>Northern</td>
                        <td>Opp. Gulu Central Market</td>
                        <td>Operations</td>
                        <td>Field Supervisor</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-4 text-center">
        <p>© 2025 Employee Management System. All rights reserved.</p>
    </footer>





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