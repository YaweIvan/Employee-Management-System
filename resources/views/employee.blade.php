<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D</title>

    <link rel="stylesheet" href="style.css">

    <!-- BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('CSS/Employee.css') }}">
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

                <a href="#">
                    <span><i class="bi bi-speedometer2"></i></span> Dashboard
                </a>

                <a href="#">
                    <span><i class="bi bi-person-lines-fill"></i></span> Profile Update
                </a>

                <a href="#">
                    <span><i class="bi bi-pencil-square"></i></span> Leave Request
                </a>

                <a href="#">
                    <span><i class="bi bi-card-checklist"></i></span> Attendence
                </a>

            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn" type="submit">Logout</button>
            </form>

        </div>

    </aside>


    <!-- MAIN CONTENT -->
    <main id="main-content">
        @if($section === 'dashboard')
        @include('partials.dashboard', ['section' => $section, 'user' => $user, 'date' => $date])
        @elseif($section === 'profile')
        @include('partials.profile', ['section' => $section])
        @elseif($section === 'leave')
        @include('partials.leave', ['section' => $section])
        @elseif($section === 'attendance')
        @include('partials.attendance', ['section' => $section])
        @endif
    </main>


    <script>
        const imageInput = document.getElementById('imageUpload');
        const previewImage = document.getElementById('previewImage');

        document.querySelector('.user').addEventListener('click', function() {
            imageInput.click();
        });

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result; // Set the uploaded image
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            }
        });
    </script>

    <footer>
        <p>@2025, Employee management System</p>
    </footer>
</body>

</html>