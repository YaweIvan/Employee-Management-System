<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>

    <link rel="stylesheet" href="{{ asset('CSS/Employee.css') }}">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    @extends('employee')

    <div class="dashboard-d">

        <div class="details">
            <p class="bold">Welcome back, <span class="name">{{$user->name ?? 'John'}}</span></p>

            <div class="detail-content">
                <span class="date">{{ $date ?? now()->format('D, d M Y')}}</span>
                <span class="notify"><i class="bi bi-bell"></i></span>
            </div>
        </div>

        <div class="content">
            <div class="card bg-yellow">
                <a href="{{ route('employee.dashboard') }}" class="{{ request()->routeIs('employee.dashboard' ? 'active' : '') }}">
                    <span><i class="bi bi-speedometer2"></i></span>
                    <p>Dashboard</p>
                </a>
            </div>
            <div class="card bg-blue">
                <a href="{{ route('employee.profile') }}" class="{{ request()->routeIs('employee.profile' ? 'active' : '') }}">
                    <span><i class="bi bi-person-lines-fill"></i></span>
                    <p>My Profile</p>
                </a>
            </div>
            <div class="card bg-green" data-section="leave">
                <a href="{{ route('employee.leave') }}" class="{{ request()->routeIs('employee.leave' ? 'active' : '') }}">
                    <span><i class="bi bi-card-list"></i></span>
                    <p>Leave Type</p>
                </a>
            </div>
            <div class="card bg-maroon attendence-pop">
                <a href="{{ route('employee.attendance') }}" class="{{ request()->routeIs('employee.attendance' ? 'active' : '') }}">
                    <span><i class="bi bi-card-checklist"></i></span>
                    <p>Attendence</p>
                </a>
            </div>
        </div>
    </div>

    <div class="notification-pop">
        <h4>Leave-Request Notification <span class="close"><i class="bi bi-x-square"></i></span></h4>
        <p>Your leave request has been succuessfully Approved</p>
    </div>

</body>

</html>