<!-- resources/views/partial/profile.blade.php -->

<section class="profile-section {{ $section === 'profile' ? 'active' : '' }}">
    <div class="profile">
        
        <div class="details">
            <a href="{{ route('employee.dashboard') }}" class="back">
                <i class="bi bi-arrow-left"></i>
            </a>
            <p class="bold">Attendance Records</p>
        </div>

        <form action="{{ route('employee.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-wrapper">
                <h3>Update Your Details</h3>
                <hr>
                <div class="form-input">
                    <input type="file" id="imageInput" name="image" hidden>
                    <img src="{{ $user->profile_image ?? asset('images/icons8-user-96-(3).png') }}" class="img icon" id="imagePreview" alt="Profile Image">
                    
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
</section>
