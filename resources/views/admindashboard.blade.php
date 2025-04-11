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

    <style>
        :root {
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #1abc9c;
            --topbar-bg: #009688;
            --body-bg: #f8f9fa;
            --card-bg: #ffffff;
            --text-color: #212529;
        }

        [data-bs-theme="dark"] {
            --sidebar-bg: #1a1d20;
            --sidebar-hover: #0d6efd;
            --topbar-bg: #212529;
            --body-bg: #121212;
            --card-bg: #212529;
            --text-color: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .sidebar {
            height: 100vh;
            background-color: var(--sidebar-bg);
            color: white;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            padding: 0 15px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            transition: all 0.3s;
            border-radius: 5px;
            margin: 5px 10px;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: var(--sidebar-hover);
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .topbar {
            background-color: var(--topbar-bg);
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            background-color: var(--card-bg);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-icon {
            font-size: 2rem;
        }

        .profile-section {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
        }

        .profile-menu {
            position: absolute;
            top: 50px;
            right: 0;
            background-color: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 200px;
            z-index: 1001;
            display: none;
        }

        .profile-menu.show {
            display: block;
        }

        .profile-menu a {
            display: block;
            padding: 10px 15px;
            color: var(--text-color);
            text-decoration: none;
            transition: background 0.3s;
        }

        .profile-menu a:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .sidebar-toggle {
            display: none;
            background: transparent;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .theme-switch {
            cursor: pointer;
            margin-right: 15px;
        }

        /* Responsive styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .content {
                margin-left: 0;
            }
            .sidebar-toggle {
                display: block;
            }
            .sidebar.show {
                transform: translateX(0);
            }
        }

        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .profile-section {
                align-self: flex-end;
            }
        }

        /* Chart container */
        .chart-container {
            height: 300px;
            width: 100%;
            margin-top: 20px;
        }

        /* Status badge styles */
        .status-badge {
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 20px;
        }

        /* Modal styles */
        .modal-content {
            border-radius: 10px;
            background-color: var(--card-bg);
            color: var(--text-color);
        }

        /* Notification badge */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 0.7rem;
            padding: 2px 6px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h4 class="text-center mb-0">Employee MS</h4>
    </div>
    <div class="px-3 mb-4 text-center">
        <img src="/api/placeholder/120/120" alt="Admin" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;">
        <h6 class="mb-0">Admin User</h6>
        <small>System Administrator</small>
    </div>
    <a href="#" class="active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
    <a href="#"><i class="fas fa-building me-2"></i> Departments</a>
    <a href="#"><i class="fas fa-suitcase me-2"></i> Leave Types</a>
    <a href="#"><i class="fas fa-users me-2"></i> Employees</a>
    <a href="#"><i class="fas fa-money-bill me-2"></i> Salary Management</a>
    <a href="#"><i class="fas fa-file-alt me-2"></i> Leave Requests</a>
    <a href="#"><i class="fas fa-chart-line me-2"></i> Reports</a>
    <a href="#"><i class="fas fa-bell me-2"></i> Notifications <span class="badge bg-danger notification-badge">3</span></a>
    <a href="#" data-bs-toggle="modal" data-bs-target="#settingsModal"><i class="fas fa-cog me-2"></i> Settings</a>
</div>

<!-- Main Content -->
<div class="content" id="content">
    <!-- Top Bar -->
    <div class="topbar">
        <div class="d-flex align-items-center">
            <button class="sidebar-toggle me-3" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="mb-0">Dashboard</h5>
        </div>
        <div class="profile-section">
            <div class="theme-switch" id="themeSwitch">
                <i class="fas fa-moon"></i>
            </div>
            <img src="/api/placeholder/100/100" alt="Admin" class="profile-pic" id="profilePic">
            <div class="profile-menu" id="profileMenu">
                <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal"><i class="fas fa-user me-2"></i> My Profile</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#settingsModal"><i class="fas fa-cog me-2"></i> Settings</a>
                <a href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </div>
        </div>
    </div>

    <!-- Overview Cards -->
    <div class="row g-3">
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-success h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">REGISTERED EMPLOYEES</h6>
                        <h4>3</h4>
                    </div>
                    <i class="fas fa-users card-icon"></i>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <small><i class="fas fa-arrow-up me-1"></i> 1 new this month</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-warning h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">LISTED DEPARTMENTS</h6>
                        <h4>4</h4>
                    </div>
                    <i class="fas fa-building card-icon"></i>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <small>IT, HR, Finance, Marketing</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-danger h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">LISTED LEAVE TYPES</h6>
                        <h4>2</h4>
                    </div>
                    <i class="fas fa-star card-icon"></i>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <small>Sick Leave, Vacation</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Leave Stats Section -->
    <div class="card mt-4">
        <div class="card-header bg-transparent">
            <h5 class="mb-0">Leaves Details</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3 col-sm-6">
                    <div class="card bg-info text-white h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">LEAVES APPLIED</h6>
                                <h4>4</h4>
                            </div>
                            <i class="fas fa-file-alt card-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card bg-warning text-dark h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">NEW REQUESTS</h6>
                                <h4>1</h4>
                            </div>
                            <i class="fas fa-file card-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card bg-danger text-white h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">REJECTED</h6>
                                <h4>1</h4>
                            </div>
                            <i class="fas fa-times-circle card-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">APPROVED</h6>
                                <h4>2</h4>
                            </div>
                            <i class="fas fa-check-circle card-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Charts Section -->
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Leave Requests Overview</h5>
                    <button class="btn btn-sm btn-outline-primary">View All</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jane Doe</td>
                                    <td>HR</td>
                                    <td>Sick Leave</td>
                                    <td>10/04/2025</td>
                                    <td>12/04/2025</td>
                                    <td><span class="badge bg-success status-badge">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>John Smith</td>
                                    <td>IT</td>
                                    <td>Vacation</td>
                                    <td>15/04/2025</td>
                                    <td>25/04/2025</td>
                                    <td><span class="badge bg-warning status-badge">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Robert Brown</td>
                                    <td>Finance</td>
                                    <td>Sick Leave</td>
                                    <td>05/04/2025</td>
                                    <td>07/04/2025</td>
                                    <td><span class="badge bg-danger status-badge">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-transparent">
                    <h5 class="mb-0">Department Distribution</h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <!-- Placeholder for chart -->
                    <div style="width:100%; max-width:300px;">
                        <img src="/api/placeholder/300/200" alt="Department Chart" class="img-fluid">
                    </div>
                    <div class="mt-3 w-100">
                        <div class="d-flex justify-content-between mb-2">
                            <span>IT Department</span>
                            <span>40%</span>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>HR Department</span>
                            <span>25%</span>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Finance Department</span>
                            <span>20%</span>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Marketing Department</span>
                            <span>15%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Access Section -->
    <div class="card mt-4">
        <div class="card-header bg-transparent">
            <h5 class="mb-0">Quick Actions</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-user-plus text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Add New Employee</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <div class="rounded-circle bg-success bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-file-invoice text-success" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Generate Payslips</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-calendar-check text-warning" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Approve Leaves</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <div class="rounded-circle bg-info bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-chart-pie text-info" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>View Reports</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-4 text-center">
        <p>© 2025 Employee Management System. All rights reserved.</p>
    </footer>
</div>

<!-- Modals -->
<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Admin Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="/api/placeholder/150/150" alt="Admin" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                    <div class="mt-2">
                        <button class="btn btn-sm btn-primary">Change Photo</button>
                    </div>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" value="Admin User">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="admin@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" value="+1 234 567 8900">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" id="role" value="System Administrator" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">System Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Appearance</h6>
                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                        <label class="form-check-label" for="darkModeSwitch">Dark Mode</label>
                    </div>
                </div>
                
                <h6>Notifications</h6>
                <div class="mb-4">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                        <label class="form-check-label" for="emailNotif">Email Notifications</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="leaveNotif" checked>
                        <label class="form-check-label" for="leaveNotif">Leave Request Notifications</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="systemNotif" checked>
                        <label class="form-check-label" for="systemNotif">System Notifications</label>
                    </div>
                </div>
                
                <h6>Security</h6>
                <div class="mb-3">
                    <button class="btn btn-sm btn-outline-primary mb-2">Change Password</button>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="twoFactor">
                        <label class="form-check-label" for="twoFactor">Enable Two-Factor Authentication</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
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