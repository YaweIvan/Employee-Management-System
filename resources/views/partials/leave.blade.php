<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave-Request</title>

    <link rel="stylesheet" href="{{ asset('CSS/Employee.css') }}">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script defer src="{{ asset('JS/employee.js') }}"></script>

</head>

<body>

@extends('employee');

    <div class="leave">

        <div class="details">
            <a class="back" href="{{ route('employee.dashboard') }}">
                <i class="bi bi-arrow-left"></i>
            </a>
            <p class="bold">Leave Request</p>
        </div>

        <div class="leave-form">

            <div class="head">
                <h3>Apply for leave</h3>
            </div>

            <form action="{{ route('employee.leave') }}" method="POST" class="pop-form" id="leave-application-form">
                @csrf
                <div class="form-select">
                    <div class="select">
                        <label for="category">Leave type </label>
                        <select id="category" name="category" required>
                            <option value="" disabled selected>Choose Leave type</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Vacation">Vacation</option>
                            <option value="Personal Leave">Personal Leave</option>
                            <option value="Maternity/Paternity">Maternity/Paternity</option>
                        </select>
                    </div>

                    <div class="input">
                        <label for="submitted">Submitted On</label>
                        <span>{{ $date ?? now()->format('D, d M Y')}}</span>
                    </div>
                </div>
                <div class="input-wrapper">
                    <span>
                        <div class="input">
                            <label for="fromDate">From</label>
                            <input type="date" name="fromDate" id="fromDate" required>
                        </div>
                        <div class="input">
                            <label for="toDate">To</label>
                            <input type="date" name="toDate" id="toDate" required>
                        </div>
                    </span>
                    <textarea id="leaveDescription" name="leaveDescription" placeholder="Write your leave description here..."></textarea>
                </div>

                <button type="submit" class="btn">
                    Apply
                    <span class="spinner"></span>
                </button>
            </form>
        </div>
    </div>

</body>

</html>