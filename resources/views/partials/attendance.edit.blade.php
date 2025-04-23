
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

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Attendance</h2>

    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST" class="mb-5">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="attendance_date" class="form-label">Attendance Date:</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" value="{{ $attendance->attendance_date }}" required>
        </div>

        <div class="mb-3">
            <label for="arrival_time" class="form-label">Arrival Time:</label>
            <input type="time" name="arrival_time" id="arrival_time" class="form-control" value="{{ $attendance->arrival_time }}">
        </div>

        <div class="mb-3">
            <label for="departure_time" class="form-label">Departure Time:</label>
            <input type="time" name="departure_time" id="departure_time" class="form-control" value="{{ $attendance->departure_time }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>Present</option>
                <option value="Absent" {{ $attendance->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                <option value="Late" {{ $attendance->status == 'Late' ? 'selected' : '' }}>Late</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Attendance</button>
    </form>
</div>
@endsection
</body>

</html>