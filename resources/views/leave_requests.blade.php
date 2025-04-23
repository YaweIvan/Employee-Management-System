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
        <div class="table-responsive">
            <table class="table table-bordered align-middle table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>SN</th>
                        <th>EmpId</th>
                        <th>Employee Name</th> <!-- Added Employee Name Column -->
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Submitted On</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveRequests as $index => $request)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $request->employee->employee_id }}</td> <!-- Display employee_id -->
                            <td>{{ $request->employee->name }}</td> <!-- Display employee name -->
                            <td>{{ $request->leaveType->leave_name }}</td> <!-- Display leave type name -->
                            <td>{{ $request->from_date }}</td> <!-- Display from date -->
                            <td>{{ $request->to_date }}</td> <!-- Display to date -->
                            <td>{{ $request->submitted_on }}</td> <!-- Display submitted on date -->
                            <td>
    @if($request->status == 'Pending')
        <form method="POST" action="{{ route('leave.updateStatus', $request->id) }}" style="display:inline-block;">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="Approved">
            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to approve this request?')">Approve</button>
        </form>
        <form method="POST" action="{{ route('leave.updateStatus', $request->id) }}" style="display:inline-block; margin-left: 5px;">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="Rejected">
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to reject this request?')">Reject</button>
        </form>
    @else
        <span class="badge 
            @if($request->status == 'Approved') bg-success
            @elseif($request->status == 'Rejected') bg-danger
            @endif">
            {{ $request->status }}
        </span>

        <!-- Cancel button to revert back to Pending -->
        <form method="POST" action="{{ route('leave.updateStatus', $request->id) }}" style="display:inline-block; margin-left: 5px;">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="Pending">
            <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Cancel this status and revert to Pending?')">Cancel</button>
        </form>

        <!-- Delete button -->
        <form method="POST" action="{{ route('leave.destroy', $request->id) }}" style="display:inline-block; margin-left: 5px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this leave request?')">Delete</button>
        </form>
    @endif
</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
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