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

@extends('employee')
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

        <form method="POST" action="{{ route('employee.leave.store') }}" class="pop-form" id="leave-application-form">
            @csrf

            <!-- Employee Name (Hidden or Readonly) -->
            <div class="mb-3">
                <label for="employee_name" class="form-label">Employee Name</label>
                <input type="text" name="employee_name" id="employee_name" class="form-control" value="{{ session('employee')->name }}" readonly required>
            </div>
            
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

            <!-- Leave Type Dropdown -->
            <div class="mb-3">
                <label for="leave_type_id" class="form-label">Leave Type</label>
                <select name="leave_type_id" class="form-select" id="leave_type_id" required>
                    <option value="">Select Leave Type</option>
                    @foreach($leaveTypes as $leave)
                        <option value="{{ $leave->id }}" data-days="{{ $leave->no_of_days }}">
                            {{ $leave->leave_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- From Date -->
            <div class="mb-3">
                <label for="from_date" class="form-label">From</label>
                <input type="date" name="from_date" id="from_date" class="form-control" required>
            </div>

            <!-- To Date -->
            <div class="mb-3">
                <label for="to_date" class="form-label">To</label>
                <input type="date" name="to_date" id="to_date" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">
                Apply Leave
                <span class="spinner"></span>
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('from_date').addEventListener('change', function () {
        const startDate = new Date(this.value);
        const leaveTypeSelect = document.getElementById('leave_type_id');
        const selectedOption = leaveTypeSelect.options[leaveTypeSelect.selectedIndex];
        const noOfDays = parseInt(selectedOption.getAttribute('data-days'));

        if (!isNaN(startDate) && !isNaN(noOfDays)) {
            const endDate = new Date(startDate);
            endDate.setDate(startDate.getDate() + noOfDays - 1); // Subtract 1 to include the start day

            // Format the end date as YYYY-MM-DD
            const formattedEndDate = endDate.toISOString().split('T')[0];
            document.getElementById('to_date').value = formattedEndDate;
        }
    });
</script>



</body>

</html>
