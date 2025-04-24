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

    <div class="container py-4">
        <h2 class="mb-4 text-center text-primary">Employee Reports</h2>

        <!-- Summary Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Employees</h5>
                        <p class="display-6 text-success">150</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Department</h5>
                        <p class="display-6 text-danger">8</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pending Leave Requests</h5>
                        <p class="display-6 text-warning">3</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3 text-center">Employees by Department</h5>
                        <canvas id="barChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3 text-center">Attendance Status</h5>
                        <canvas id="pieChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3">Employee Attendance Report</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>Department</th>
                                <th>Present Days</th>
                                <th>Absent Days</th>
                                <th>Performance Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Alice Johnson</td>
                                <td>HR</td>
                                <td>22</td>
                                <td>2</td>
                                <td><span class="badge bg-success">Excellent</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Michael Smith</td>
                                <td>IT</td>
                                <td>20</td>
                                <td>4</td>
                                <td><span class="badge bg-warning text-dark">Average</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sophia Lee</td>
                                <td>Finance</td>
                                <td>18</td>
                                <td>6</td>
                                <td><span class="badge bg-danger">Needs Improvement</span></td>
                            </tr>
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

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Initialization -->
<script>
    // Bar Chart: Employees by Department
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['HR', 'IT', 'Finance', 'Marketing', 'Admin'],
            datasets: [{
                label: 'No. of Employees',
                data: [30, 45, 25, 20, 30],
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Pie Chart: Attendance Status
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Present', 'Absent', 'On Leave'],
            datasets: [{
                data: [120, 20, 10],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.7)', // green
                    'rgba(220, 53, 69, 0.7)', // red
                    'rgba(255, 193, 7, 0.7)'  // yellow
                ],
                borderColor: [
                    'rgba(40, 167, 69, 1)',
                    'rgba(220, 53, 69, 1)',
                    'rgba(255, 193, 7, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        }
    });
</script>

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