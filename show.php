<?php
$villa = $_GET['villa'];
$title = "Titi Vacation Homes - $villa";
$page = "show";
include_once 'includes/header.php';

if ($prod) {
    $villa_query = "SELECT * FROM villas WHERE name = '$villa';";
    $result = mysqli_query($con, $villa_query);
    $villa = mysqli_fetch_assoc($result);
} else {
    include_once 'includes/fake_villas.php';

    $villa = $villas[$villa];
}

$img_src_arr = [];
$slug = $villa['slug'];
$villa_directory_files = scandir("assets/$slug/compressed/1500px/");

foreach($villa_directory_files as $idx => $file) {
    if ($file[0] == '.') continue;
    $img_src_arr[] = $file;
}

?>

    <div id="show-carousel-container">
        <div id="carousel-img-count">View <?php echo count($img_src_arr); ?> photos</div>
        <div  class="villa-img-arrow prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
                <path d="m15 18-6-6 6-6"/>
            </svg>
        </div>
        <?php
        foreach($img_src_arr as $idx => $img_src) {
            $class = '';
            if ($idx == count($img_src_arr) - 2) $class = 'active left_2';
            if ($idx == count($img_src_arr) - 1) $class = 'active left';
            if ($idx == 0) $class = 'active middle';
            if ($idx == 1) $class = 'active right';
            if ($idx == 2) $class = 'active right_2';
            echo "
                <div class='show-carousel-img $class'>
                    <img data-idx='$idx' src='assets/$slug/compressed/1500px/$img_src' />
                </div>
            ";
        }
        ?>
        <div class="villa-img-arrow next">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                <path d="m9 18 6-6-6-6"/>
            </svg>
        </div>
    </div>

    <main id="details">
        <div class="header">
            <h1><?php echo $villa['name']; ?></h1>
            <div class="location-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                <a href="<?php echo $villa['address_link']; ?>" target="_blank"><?php echo $villa['address']; ?></a>
            </div>
        </div>
        <div class="first-four">
            <div class="villa-icon-pair">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <span><?php echo $villa['guests']; ?> Guests</span>
            </div>
            <div class="villa-icon-pair">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double">
                    <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"/>
                    <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"/>
                    <path d="M12 4v6"/>
                    <path d="M2 18h20"/>
                </svg>
                <span><?php echo $villa['beds']; ?> Beds</span>
            </div>
            <div class="villa-icon-pair">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shower-head">
                    <path d="m4 4 2.5 2.5"/>
                    <path d="M13.5 6.5a4.95 4.95 0 0 0-7 7"/>
                    <path d="M15 5 5 15"/>
                    <path d="M14 17v.01"/>
                    <path d="M10 16v.01"/>
                    <path d="M13 13v.01"/>
                    <path d="M16 10v.01"/>
                    <path d="M11 20v.01"/>
                    <path d="M17 14v.01"/>
                    <path d="M20 11v.01"/>
                </svg>
                <span><?php echo $villa['baths']; ?> Bathrooms</span>
            </div>
            <div class="villa-icon-pair">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scaling">
                    <path d="M21 3 9 15"/>
                    <path d="M12 3H3v18h18v-9"/>
                    <path d="M16 3h5v5"/>
                    <path d="M14 15H9v-5"/>
                </svg>
                <span><?php echo $villa['sq_foot']; ?> sq ft</span>
            </div>
        </div>
    </main>


    <script>
        $("#show-carousel-container .villa-img-arrow").on('click', function() {
            if ($('#show-carousel-container').hasClass('sliding')) return;
            $('#show-carousel-container').addClass('sliding');
            const goingRight = $(this).hasClass('next');
            // Get all image containers
            const left_2 = $("#show-carousel-container .left_2");
            const left = $("#show-carousel-container .left");
            const middle = $("#show-carousel-container .middle");
            const right = $("#show-carousel-container .right");
            const right_2 = $("#show-carousel-container .right_2");
            // Remove Classes
            left_2.removeClass('left_2');
            left.removeClass('left');
            middle.removeClass('middle');
            right.removeClass('right');
            right_2.removeClass('right_2');
            // Assign new classes
            if (goingRight) {
                left_2.removeClass('active');
                left.addClass('left_2');
                middle.addClass('left');
                right.addClass('middle');
                right_2.addClass('right');
                if (right_2.next('.show-carousel-img').length) {
                    right_2.next('.show-carousel-img').addClass('right_2 active');
                } else {
                    $('.show-carousel-img').first('.show-carousel-img').addClass('right_2 active');
                }
            } else {
                right_2.removeClass('active');
                right.addClass('right_2');
                middle.addClass('right');
                left.addClass('middle');
                left_2.addClass('left');
                if (left_2.prev('.show-carousel-img').length) {
                    left_2.prev('.show-carousel-img').addClass('left_2 active');
                } else {
                    $('.show-carousel-img').first('.show-carousel-img').addClass('left_2 active');
                }
            }
            setTimeout(() => $('#show-carousel-container').removeClass('sliding'), 760);
        });
    </script>

<?php include_once 'includes/footer.php' ?>