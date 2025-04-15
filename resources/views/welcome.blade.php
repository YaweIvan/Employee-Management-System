<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - WorkforceWave Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .logo {
            width: 80px;
            height: 80px;
            borderRadius:80px;
            object-fit: cover;
        }

        .system-name {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #0d6efd;
        }

        .login-card {
            width: 250px;
        }

        .btn-custom {
            width: 100%;
            padding: 10px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 500;
        }

        .card-body {
            text-align: center;
        }

        @media (max-width: 768px) {
            .login-card {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="text-center">
        <!-- Logo & Title -->
        <img src="{{ asset('images/bossminions.png') }}" alt="WorkforceWave Logo" class="logo mb-2">

        <h1 class="system-name">WorkforceWave Management System</h1>

        <!-- Login Cards -->
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-4">
            <!-- Employee Card -->
            <div class="card login-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Employee Portal</h5>
                    <p class="text-muted">Access your dashboard and manage your tasks.</p>
                    <a href="{{ url('/employee/login') }}"class="btn btn-primary btn-custom">Employee Login</a>
                </div>
            </div>

            <!-- Admin Card -->
            <div class="card login-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Admin Panel</h5>
                    <p class="text-muted">Login to manage workforce and settings.</p>
                    <a href="{{url('/admin/admindashboard')}}" class="btn btn-dark btn-custom">Admin Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
