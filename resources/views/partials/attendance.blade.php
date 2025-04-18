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

    @extends('employee');

    <div class="attendance">
        <div class="details">
            <a class="back" href="{{ route('employee.dashboard') }}">
                <i class="bi bi-arrow-left"></i>
            </a>
            <p class="bold">Attendance Records</p>
        </div>

        <div class="attendance-details">
            <div class="head">
                <h3>My Attendance History</h3>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Arrival Time</th>
                        <th>Departure Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="status-present"><span></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="status-absent"><span></span></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>