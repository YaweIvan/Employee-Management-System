<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance</title>

    <link rel="stylesheet" href="{{ asset('CSS/Employee.css') }}">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

@extends('employee')

@section('content')

<div class="mt-4" style="margin-left: 280px; padding-right: 20px;">
    <h2 class="mb-4" style="font-weight: bold; color: black;">Record Attendance</h2>
    
    <form action="{{ route('attendance.store') }}" method="POST" class="mb-5">
        @csrf

        <input type="hidden" name="employee_id" value="{{ $employee->id }}">

        <div class="mb-3">
    <label for="attendance_date" class="form-label" style="font-weight: bold; color: black;">Attendance Date:</label>
    <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
</div>

<div class="mb-3">
    <label for="arrival_time" class="form-label" style="font-weight: bold; color: black;">Arrival Time:</label>
    <input type="time" name="arrival_time" id="arrival_time" class="form-control">
</div>

<div class="mb-3">
    <label for="departure_time" class="form-label" style="font-weight: bold; color: black;">Departure Time:</label>
    <input type="time" name="departure_time" id="departure_time" class="form-control">
</div>

<div class="mb-3">
    <label for="status" class="form-label" style="font-weight: bold; color: black;">Status:</label>
    <select name="status" id="status" class="form-select" required>
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
        <option value="Leave">Leave</option>
    </select>
</div>


        <button type="submit" class="btn btn-primary">Save Attendance</button>
    </form>

    <hr>

    <h3 class="mt-4" style="font-weight: bold; color: black;">My Attendance History</h3>

    <table class="table table-striped mt-3">
        <thead>
        <tr>
    <th>Date</th>
    <th>Arrival Time</th>
    <th>Departure Time</th>
    <th>Status</th>
    <th>Actions</th> <!-- Added column for actions -->
</tr>
</thead>
<tbody>
    @forelse ($attendances as $attendance)
        <tr>
            <td>{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('M d, Y') }}</td>
            <td>{{ $attendance->arrival_time ?? '-' }}</td>
            <td>{{ $attendance->departure_time ?? '-' }}</td>
            <td class="status-{{ strtolower($attendance->status) }}">
                {{ ucfirst($attendance->status) }}
            </td>
            <td>
                <!-- Edit Button 
                <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-warning btn-sm">Edit</a> -->

                <!-- Delete Button -->
                <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No attendance records found.</td>
        </tr>
    @endforelse
</tbody>

    </table>
</div>

@endsection


</html>