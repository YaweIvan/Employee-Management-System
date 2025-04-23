<div class="topbar">
    <div class="d-flex align-items-center">
        <button class="sidebar-toggle me-3" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <h5 class="mb-0">Dashboard</h5>

        <!-- Home Button -->
        <a href="{{ url('/') }}" class="btn btn-outline-light ms-4">
        <i class="fas fa-sign-out-alt me-2"></i>Log Out
        </a>
    </div>

    <div class="profile-section">
        <div class="theme-switch" id="themeSwitch">
            <i class="fas fa-moon"></i>
        </div>
        <img src="/api/placeholder/100/100" alt="Admin" class="profile-pic" id="profilePic">
        <div class="profile-menu" id="profileMenu">
            <<a href="{{ route('admin.profile') }}">
    <i class="fas fa-user me-2"></i> Admin Profile
</a>
        
    
        </div>
    </div>
</div>
