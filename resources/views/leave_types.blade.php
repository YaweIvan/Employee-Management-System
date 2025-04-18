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

/* Table styling */
.table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

/* Header row styling */
.table th {
    background-color: #343a40; /* Dark background for headers */
    color: white;
    text-align: center;
    padding: 12px;
    font-weight: bold;
}

/* Table row styling */
.table td {
    text-align: center;
    padding: 10px;
    vertical-align: middle;
}

/* Zebra striping for table rows */
.table-striped tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

/* Button styling */
.btn-info {
    background-color: #17a2b8;
    border: none;
    color: white;
    padding: 8px 16px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
    color: white;
    padding: 8px 16px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-warning:hover {
    background-color: #e0a800;
}

/* Select dropdown styling */
.form-select {
    width: 100%;
    padding: 8px;
    font-size: 14px;
    border-radius: 5px;
}

/* Table responsiveness */
.table-responsive {
    overflow-x: auto;
    margin-top: 20px;
}

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
    <div class="header d-flex justify-content-end">
        <a href="{{ route('admin.addleave') }}" class="btn btn-primary btn-add-leave">
            <i class="fas fa-pen"></i> ✏️ Add Leave
        </a>
    </div>
</div>



        <!-- Table for Leave Management -->
        <div class="table-responsive mt-4">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>SN</th>
                <th>Leave</th>
                <th>No of Days</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $index => $leave)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><button class="btn btn-info">{{ $leave->leave_name }}</button></td>
                    <td>{{ $leave->no_of_days }}</td>
                    <td>
                        <select class="form-select" disabled>
                            <option {{ $leave->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            <option {{ $leave->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option {{ $leave->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </td>
                    <td>
                        <a href="{{ route('admin.editleave', $leave->id) }}" class="btn btn-warning">✏️ Edit</a>

                        <form action="{{ route('admin.deleteleave', $leave->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this leave?')">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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