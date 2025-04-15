<section class="leave-section {{ $section === 'leave' ? 'active' : '' }}">

    <div class="leave">

        <div class="details">
            <span class="back">
                <i class="bi bi-arrow-left"></i>
            </span>
            <p class="bold">Leave Request</p>
        </div>

        <button class="btn" id="open-popup">Apply for Leave</button>
        <form action="" class="form-wrapper" id="leave-details-form">

            <h3>Leave Details</h3>
            
            <div class="form-content">
                <div class="input">
                    <label for="sn">SN</label>
                    <input id="sn" type="text" name="sn">
                </div>

                <div class="input">
                    <label for="leave">Leave Type</label>
                    <input id="leave" type="text" name="leave">
                </div>
                <div class="input">
                    <label for="from">From</label>
                    <input id="from" value="March 10, 2025" type="text" name="from">
                </div>
                <div class="input">
                    <label for="to">To</label>
                    <input id="to" value="March 30, 2025" type="text" name="to">
                </div>
                <div class="input">
                    <label for="submitted">Submitted On</label>
                    <input id="submitted" type="text" name="submitted">
                </div>
                <div class="input">
                    <label for="status">Status</label>
                    <input id="status" value="Approved" type="text" name="status">
                </div>
                <div class="input del">
                    <label for="action">Action</label>
                    <span class="delete"><i class="bi bi-trash3"></i></span>
                </div>
                <div class="no-records">
                    No Record found
                </div>
            </div>

        </form>
    </div>
    <div class="overlay"></div>
    <div class="popup">
        <div class="head">
            <h3>Apply for leave</h3>
            <span id="close"><i class="bi bi-x-square"></i></span>
        </div>
        <form action="{{ route('employee.leave.apply') }}" method="POST" class="pop-form" id="leave-application-form">
            @csrf
            <div class="form-select">
                <label for="category">Leave type </label>
                <select id="category" name="category" required>
                    <option value="" disabled selected>Choose Leave type</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Vacation">Vacation</option>
                    <option value="Personal Leave">Personal Leave</option>
                    <option value="Maternity/Paternity">Maternity/Paternity</option>
                </select>
            </div>
            <div class="input-wrapper">
                <div class="input">
                    <label for="fromDate">From</label>
                    <input type="date" name="from" id="fromDate" required>
                </div>
                <div class="input">
                    <label for="toDate">To</label>
                    <input type="date" name="to" id="toDate" required>
                </div>
            </div>
            <textarea id="leaveDescription" name="leaveDescription"
                placeholder="Write your leave description here..."></textarea>
            <button type="submit" class="btn">
                Apply
                <span class="spinner"></span>
            </button>
        </form>
    </div>


</section>