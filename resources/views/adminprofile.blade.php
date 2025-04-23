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

<<form id="profileForm" action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="text-center mb-4">
        <img src="/api/placeholder/150/150" alt="Admin" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
        <div class="col-md-6 mb-3 mx-auto">
            <label class="form-label">Add Image</label>
            <input type="file" name="admin_image" class="form-control" accept="image/*">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Admin Name</label>
        <input type="text" name="admin_name" class="form-control" value="Admin User">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="admin_email" class="form-control" value="admin@example.com">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="tel" name="admin_phone" class="form-control" value="+1 234 567 8900">
    </div>
    <div class="mb-3">
        <label class="form-label">Role</label>
        <input type="text" name="admin_role" class="form-control" value="System Administrator" readonly>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>
<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
