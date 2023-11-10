<?php
$g_s = $guests == 1 ? '' : 's';
$be_s = $beds == 1 ? '' : 's';
$ba_s = $baths == 1 ? '' : 's';
?>



<div class="villa">
    <h2 class="villa-title"><?php echo $title?></h2>
    <div class="villa-img">
        <img src="<?php echo $img_src?>">
    </div>
    <div class="villa-body">
        <div class="villa-icon-pair">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <span><?php echo "$guests Guest$g_s"; ?></span>
        </div>
        <div class="villa-icon-pair">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double"><path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"/><path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"/><path d="M12 4v6"/><path d="M2 18h20"/></svg>
            <span><?php echo "$beds Bed$be_s"; ?></span>
        </div>
        <div class="villa-icon-pair">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shower-head"><path d="m4 4 2.5 2.5"/><path d="M13.5 6.5a4.95 4.95 0 0 0-7 7"/><path d="M15 5 5 15"/><path d="M14 17v.01"/><path d="M10 16v.01"/><path d="M13 13v.01"/><path d="M16 10v.01"/><path d="M11 20v.01"/><path d="M17 14v.01"/><path d="M20 11v.01"/></svg>
            <span><?php echo "$baths Bath$ba_s"; ?></span>
        </div>
    </div>
    <div class="villa-footer">
        <div class="book-now-container">
            <div class="main-btn">Book Now</div>
            <div class="booking-btns">
                <div class="booking-btn booking-dot-com">
                    <img src="https://yt3.ggpht.com/a/AGF-l7-lxyYHCtf0rFgYIdrbPcwuc0oBabPNg4MClg=s900-c-k-c0xffffffff-no-rj-mo" alt="Booking.com logo">
                    <span>Booking.com</span>
                </div>
                <div class="booking-btn airbnb">
                    <img src="https://i.pinimg.com/originals/5e/10/d7/5e10d70b73f61c76194ef63da8f5c22a.png" alt="Airbnb logo">
                    <span>Airbnb</span>
                </div>
            </div>
        </div>
        <div class="main-btn details">Details</div>
    </div>
</div>