<section class="attendence-section {{ $section === 'attendance' ? 'active' : '' }}">

    <div class="attendence">

        <div class="details">
            <span class="back">
                <i class="bi bi-arrow-left"></i>
            </span>
            <p class="bold">Attendence Records</p>
        </div>


        <div class="overlay"></div>
        <div class="attendence-details">
            <div class="head">
                <h3>My Attendance History</h3>
                <span id="close"><i class="bi bi-x-square"></i></span>
            </div>
            <form action="" class="form-wrap">
                <div class="input">
                    <label for="sn-A">SN</label>
                    <input type="text" id="sn-A" name="sn">
                </div>
                <div class="input">
                    <label for="punch-in">Punch-In</label>
                    <input type="text" name="punchIn" id="punch-in">
                </div>
                <div class="input">
                    <label for="punch-out">Punch-Out</label>
                    <input type="text" name="punchOut" id="punch-out">
                </div>
                <div class="no-records">
                    No Record found
                </div>
            </form>
        </div>

    </div>


</section>