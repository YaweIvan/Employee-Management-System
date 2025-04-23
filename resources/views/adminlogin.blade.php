<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Employee Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h4>Admin Login</h4>
                    </div>
                    <div class="card-body">
                      <!-- error message -->
                    @if (session('error'))
                        <div class="alert alert-danger mt-2">
                            {{ session('error') }}
                        </div>
                    @endif

                       <!-- resources/views/adminlogin.blade.php -->
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        Show
                                    </button>
                                </div>
                            </div>

                    
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    </div>
                    <div class="card-footer text-center text-muted">
                        &copy; 2025 Employee Management System
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
</script>

</body>
</html>