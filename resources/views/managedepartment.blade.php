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
    .table thead th {
        background-color: #007bff;
        color: white;
    }

    .btn-sm i {
        margin-right: 5px;
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
    <h3 class="mb-4">Manage Departments</h3>

    
    <table class="table table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Department Name</th>
            <th>Short Form</th>
            <th>Code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $department->department_name }}</td>
                <td>{{ $department->shortform }}</td>
                <td>{{ $department->department_code }}</td>
                <td>
    <!-- Edit Button -->
    <a href="{{ route('admin.edit_department', $department->id) }}" class="btn btn-sm btn-warning">
        <i class="fas fa-edit"></i> Edit
    </a>

    <!-- Delete Button -->
    <form action="{{ route('admin.delete_department', $department->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this department?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">
            <i class="fas fa-trash"></i> Delete
        </button>
    </form>
</td>

            </tr>
        @endforeach
    </tbody>
</table>




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