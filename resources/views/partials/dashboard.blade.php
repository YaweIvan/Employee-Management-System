<section class="dashboard-section {{ $section === 'dashboard' ? 'active' : '' }}">

    <div class="dashboard-d">

        <div class="details">
            <p class="bold">Welcome back, <span class="name">{{$user->name ?? 'John'}}</span></p>
            <span class="date">{{ $date ?? now()->format('D, d M Y')}}</span>
        </div>

        <div class="content">
            <div class="card bg-yellow">
                <a href="">
                    <span><i class="bi bi-speedometer2"></i></span>
                    <p>Dashboard</p>
                </a>
            </div>
            <div class="card bg-blue">
                <a href="">
                    <span><i class="bi bi-person-lines-fill"></i></span>
                    <p>My Profile</p>
                </a>
            </div>
            <div class="card bg-green" data-section="leave">
                <a href="">
                    <span><i class="bi bi-card-list"></i></span>
                    <p>Leave Type</p>
                </a>
            </div>
            <div class="card bg-maroon attendence-pop">
                <a href="">
                    <span><i class="bi bi-card-checklist"></i></span>
                    <p>Attendence</p>
                </a>
            </div>
        </div>
    </div>

</section>