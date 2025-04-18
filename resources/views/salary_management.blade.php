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
        .card-header {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        h2 {
            font-weight: 600;
            color: #343a40;
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

<div class="container mt-4">
    <h2 class="mb-4 text-center">Salary Management</h2>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-plus me-2"></i> Add Salary Record
        </div>
        <div class="card-body">
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="employee_id">Employee</label>
                    <select name="employee_id" id="employee_id" class="form-control" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="pay_period">Pay Period</label>
                    <input type="text" name="pay_period" id="pay_period" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="basic_salary">Basic Salary</label>
                    <input type="number" name="basic_salary" id="basic_salary" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="allowances">Allowances</label>
                    <input type="number" name="allowances" id="allowances" class="form-control" value="0">
                </div>

                <button type="submit" class="btn btn-primary">Save Salary</button>
            </form>
        </div>
    </div>

    <!-- Payroll Records Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <i class="fas fa-list me-2"></i> Payroll Generation
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Employee</th>
                            <th>Pay Period</th>
                            <th>Basic Salary</th>
                            <th>Allowances (if any)</th>
                            <th>Net Pay</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($salaries as $salary)
                            <tr>
                                <td>{{ $salary->No }}</td>
                                <td>{{ $salary->employee->name }}</td> <!-- Changed to employee relationship -->
                                <td>{{ $salary->pay_period }}</td>
                                <td>${{ number_format($salary->basic_salary, 2) }}</td>
                                <td>${{ number_format($salary->allowances, 2) }}</td>
                                <td>
                                    ${{ number_format($salary->basic_salary + $salary->allowances, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="mt-4 text-center">
    <p>© 2025 Employee Management System. All rights reserved.</p>
</footer>
</div>

@if(session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif

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
