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
    
</head>

<body>

    @include('employee');

    <div class="profile">

        <div class="details">
            <a class="back" href="{{ route('employee.dashboard') }}">
                <i class="bi bi-arrow-left"></i>
            </a>
            <p class="bold">Attendence Records</p>
        </div>

        <form action="{{ route('employee.profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-wrapper">
                <h3>Update Your Details</h3>
                <div class="form-input">
                    <input type="file" id="imageInput" name="image" hidden>
                    <img src="{{$user->profile_image ?? asset('images/icons8-user-96-(3).png')}}" class="img icon" id="imagePreview" alt="">
                    <div class="input-wrapper">
                        <div class="input">
                            <input type="password" name="current_password" placeholder="Current password" />
                            <span class="eye"><i class="bi bi-eye"></i></span>
                        </div>
                        <div class="input">
                            <input type="password" name="new_password" placeholder="New password" />
                            <span class="eye"><i class="bi bi-eye"></i></span>
                        </div>
                        <div class="input">
                            <input type="password" name="new_password_confirmation" placeholder="Confirm password" />
                            <span class="eye"><i class="bi bi-eye"></i></span>
                        </div>
                    </div>
                </div>
                <button class="btn" type="submit">Save changes</button>
            </div>
        </form>
    </div>

</body>

</html>