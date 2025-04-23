<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    
    <link rel="stylesheet" href="{{ asset('CSS/Employee.css') }}">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    @extends('employee')
    <div class="profile p-4">
    <div class="details mb-3">
        <a class="back" href="{{ route('employee.dashboard') }}">
            <i class="bi bi-arrow-left"></i>
        </a>
    </div>

    <h4 class="mb-3">Leave Requests</h4>

    <div class="d-flex justify-content-center w-100">
        <div class="table-responsive" style="min-width: 300px; max-width: 1000px;">
            <table class="table table-bordered table-striped text-center m-0">
                <thead class="table-light">
                    <tr>
                        <th>Leave Type</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Status</th>
                        <th>Submitted On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveRequests as $request)
                        <tr>
                            <td>{{ $request->leaveType->leave_name }}</td>
                            <td>{{ $request->from_date }}</td>
                            <td>{{ $request->to_date }}</td>
                            <td>
                                @if($request->status == 'Pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($request->status == 'Approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($request->status == 'Rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td>{{ $request->submitted_on }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


        
    </div>

</body>

</html>
