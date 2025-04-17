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

/* Add this CSS to your stylesheet */
input[type="text"] {
    font-size: 0.875rem;  /* Smaller text size for a more compact look */
    padding: 0.5rem 1rem;  /* Reduced padding for smaller input */
    border-radius: 0.375rem;  /* Smaller rounded corners */
    border: 1px solid #ccc;  /* Soft border color */
    transition: border-color 0.3s ease, box-shadow 0.3s ease;  /* Smooth transition */
}

input[type="text"]:focus {
    border-color: #007bff;  /* Focus border color */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);  /* Soft blue glow when focused */
}

button[type="submit"] {
    font-size: 0.875rem;  /* Smaller font size */
    padding: 0.5rem 1.25rem;  /* Reduced padding for smaller button */
    border-radius: 0.375rem;  /* Rounded corners for the button */
    border: none;
    transition: background-color 0.3s ease, transform 0.2s ease;  /* Smooth transition */
}

button[type="submit"]:hover {
    background-color: #0056b3;  /* Darker shade of blue for hover */
    transform: scale(1.05);  /* Slight scale-up effect on hover */
}

.input-group {
    display: flex;
    gap: 5px;  /* Smaller gap between the input and button */
}

.row {
    margin: 0;  /* Remove any extra margin */
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
<!-- search for employee -->
<form method="GET" action="{{ route('admin.search_employee') }}" class="mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by Name or Employee ID" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </div>
        </div>
    </div>
</form>

    

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
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $index => $employee)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->employee_id }}</td>
                    <td>{{ $employee->city }}</td>
                    <td>{{ $employee->district }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->role }}</td>
                    <td class="text-center">
                       @if ($employee->image)
                            <img src="{{ asset('storage/' . $employee->image) }}" alt="Image" class="img-fluid rounded-circle" width="50">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif

                        <td class="text-center">
                    <!-- Edit Button -->
                    <a href="{{ route('admin.employee.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
                <td class="text-center">
                    <!-- Delete Button -->
                    <form action="{{ route('admin.employee.delete', $employee->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>

                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center text-muted">No employees found.</td>
                </tr>
            @endforelse
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