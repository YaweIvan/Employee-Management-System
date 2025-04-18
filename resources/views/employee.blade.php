<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>

    <!-- BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('CSS/Employee.css') }}">

    <script src="{{ asset('JS/employee.js') }}" defer></script>
     <style>
        
     </style>
</head>

<body>

    <aside class="asideBar">

        <h2>Employee Dashboard</h2>

        <div class="user-details">
            <span class="user">
                <img src="{{  $user->profile_image ?? asset('images/icons8-user-96.png')}}" id="previewImage" alt="">
                <input type="file" name="" accept="image/*" style="display: none;" id="imageUpload">
            </span>
            <p>{{$user->name ?? 'John Doe'}}</p>
        </div>

        <div class="dashboard">

            <div class="dashboard-links">

                <a href="{{ route('employee.dashboard') }}" class="{{ request()->routeIs('employee.dashboard')  ? 'active' : '' }}">
                    <span><i class="bi bi-speedometer2"></i></span> Dashboard
                </a>

                <a href="{{ route('employee.profile') }}" class="{{ request()->routeIs('employee.profile') ? 'active' : '' }}">
                    <span><i class="bi bi-person-lines-fill"></i></span> Profile Update
                </a>

                <a href="{{ route('employee.leave') }}" class="{{ request()->routeIs('employee.leave') ? 'active' : '' }}">
                    <span><i class="bi bi-pencil-square"></i></span> Leave Request
                </a>

                <a href="{{ route('employee.attendance') }}" class="{{ request()->routeIs('employee.attendaance')  ? 'active' : ''}}">
                    <span><i class="bi bi-card-checklist"></i></span> Attendance
                </a>

            </div>

            <a href="{{ url('/') }}" 
   style="display: inline-block; padding: 10px 20px; background-color: #dc3545; color: white; font-weight: 600; border: none; border-radius: 8px; text-decoration: none; transition: background-color 0.3s ease;"
   onmouseover="this.style.backgroundColor='#c82333'"
   onmouseout="this.style.backgroundColor='#dc3545'">
   Logout
</a>


        </div>

    </aside>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>@2025, Employee management System</p>
    </footer>

</body>

</html>