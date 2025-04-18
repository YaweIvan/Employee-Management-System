<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .form-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #6c757d;
        }
        .form-control {
            padding-left: 2.5rem;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card login-card p-4" style="width: 100%; max-width: 420px;">
        <div class="text-center mb-4">
            <h4 class="fw-bold text-primary">Employee Login</h4>
            <p class="text-muted">Access your dashboard</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('employee.login.submit') }}">
            @csrf

            <div class="mb-3 position-relative">
                <i class="bi bi-person-fill form-icon"></i>
                <input type="email" name="username" class="form-control" placeholder="Username (Email)" required autofocus>
            </div>

            <div class="mb-3 position-relative">
                <i class="bi bi-hash form-icon"></i>
                <input type="text" name="employee_number" class="form-control" placeholder="Employee Number" required>
            </div>

            <div class="d-grid">
                <!-- Change this to a submit button -->
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
