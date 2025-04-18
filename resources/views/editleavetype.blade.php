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

    /* Custom styling for the table container */
.content {
    padding: 20px;
    background-color: #f8f9fa; /* Light background for the content */
    border-radius: 10px;
}

/

/* Footer styling */
footer {
    background-color: #343a40;
    color: white;
    padding: 10px 0;
    margin-top: 30px;
}

footer p {
    margin: 0;
}

.header {
    display: flex;
    justify-content: flex-end;
    padding: 15px 0;
    margin-bottom: 20px;
}

.btn-add-leave {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-add-leave:hover {
    background-color: #218838;
    transform: translateY(-2px);
    cursor: pointer;
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

/* Custom styling for the Edit Leave Type form */
.container {
    max-width: 800px; /* Limit the container width */
    margin-top: 50px; /* Space at the top */
}

h3 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

form {
    background-color: #f9f9f9; /* Light background for the form */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for the form */
}

.form-label {
    font-weight: bold;
    color: #444;
}

.form-control,
.form-select {
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 10px;
}

.btn {
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 14px;
}

.btn-success {
    background-color: #28a745;
    border: none;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-secondary {
    background-color: #6c757d;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.alert {
    border-radius: 5px;
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

    <!-- Leave Management Section -->
    <div class="container mt-4">
        <h3>Edit Leave Type</h3>

        <!-- Display Success or Error Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Edit Form -->
        <form action="{{ route('admin.updateleave', $leave->id) }}" method="POST">
            @csrf
            <!-- Leave Name -->
            <div class="mb-3">
                <label for="leave_name" class="form-label">Leave Name</label>
                <input type="text" class="form-control" id="leave_name" name="leave_name" value="{{ old('leave_name', $leave->leave_name) }}" required>
            </div>

            <!-- Number of Days -->
            <div class="mb-3">
                <label for="no_of_days" class="form-label">Number of Days</label>
                <input type="number" class="form-control" id="no_of_days" name="no_of_days" value="{{ old('no_of_days', $leave->no_of_days) }}" required min="1">
            </div>

            <!-- Leave Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Active" {{ $leave->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $leave->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="Pending" {{ $leave->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Update Leave</button>
                <a href="{{ route('admin.leave_types') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>


</div>

    
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