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