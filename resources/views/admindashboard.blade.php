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

    

    <!-- Quick Access Section -->
    <div class="card mt-4">
    <div class="card-header bg-transparent">
        <h5 class="mb-0">Quick Actions</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <!-- Add New Employee -->
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 text-center">
                    <a href="{{ route('admin.add_employee') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-user-plus text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Add New Employee</h6>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Generate Payslips (you can link it to your salary management or similar) -->
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 text-center">
                    <a href="{{ route('admin.salary') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="rounded-circle bg-success bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-file-invoice text-success" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Generate Payslips</h6>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Approve Leaves -->
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 text-center">
                    <a href="{{ route('admin.leave_requests') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-calendar-check text-warning" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>Approve Leaves</h6>
                        </div>
                    </a>
                </div>
            </div>

            <!-- View Reports -->
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 text-center">
                    <a href="{{ route('admin.reports') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="rounded-circle bg-info bg-opacity-10 p-3 mx-auto mb-3" style="width: fit-content;">
                                <i class="fas fa-chart-pie text-info" style="font-size: 1.5rem;"></i>
                            </div>
                            <h6>View Reports</h6>
                        </div>
                    </a>
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