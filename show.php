<?php
$villa = $_GET['villa'];
$title = "Titi Vacation Homes - $villa";
$page = "show";
include_once 'includes/header.php';
include_once 'includes/lookups.php';

if ($prod) {
    $villa_query = "SELECT * FROM villas WHERE name = '$villa';";
    $result = mysqli_query($con, $villa_query);
    $villa = mysqli_fetch_assoc($result);
    
    $minimum_stays_query = "SELECT * FROM minimum_stays WHERE villa_id = {$villa['id']};";
    $result = mysqli_query($con, $minimum_stays_query);
    while($row = mysqli_fetch_assoc($result)) $villa['minimum_stays'][] = $row;
} else {
    include_once 'includes/fake_villas.php';

    $villa = $villas[$villa];
    foreach($minimum_stays as $idx => $stay) {
        if ($stay['villa_id'] == $villa['id']) {
            $villa['minimum_stays'][] = $stay;
        }
    }
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
                <?php echo $villa_svg_lookup['guests']; ?>
                <span><?php echo $villa['guests']; ?> Guests</span>
            </div>
            <div class="villa-icon-pair">
                <?php echo $villa_svg_lookup['beds']; ?>
                <span><?php echo $villa['bedrooms']; ?> Bedroom<?php echo $villa['bedrooms'] > 1 ? 's' : ''; ?></span>
            </div>
            <div class="villa-icon-pair">
                <?php echo $villa_svg_lookup['beds']; ?>
                <span><?php echo $villa['beds']; ?> Beds</span>
            </div>
            <div class="villa-icon-pair">
                <?php echo $villa_svg_lookup['baths']; ?>
                <span><?php echo $villa['baths']; ?> Bathrooms</span>
            </div>
        </div>
        <div class="policies">
            <h2>Policies</h2>
            <ul>
                <?php
                $policies = explode("<br>", $villa['policies']);
                foreach($policies as $policy) echo "<li>$policy</li>";
                ?>
            </ul>
        </div>
        <div class="pricing">
            <h2>Pricing</h2>
            <table>
                <thead>
                    <tr>
                        <th>Dates</th>
                        <th>Cost ($USD)</th>
                        <th>Minimum Stay</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($villa['minimum_stays'] as $idx => $stay) {
                        echo "
                            <tr>
                                <td>$stay[dates]</td>
                                <td>$$stay[cost] p/n</td>
                                <td>$stay[minimum]</td>
                            </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>


    <div id="image-gallery">
        <div class="close gallery-btn" onclick="$('html').removeClass('viewing')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                <path d="M18 6 6 18"/>
                <path d="m6 6 12 12"/>
            </svg>
        </div>
        <div  class="gallery-btn villa-img-arrow prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
                <path d="m15 18-6-6 6-6"/>
            </svg>
        </div>
        <?php
        foreach($img_src_arr as $idx => $img_src) {
            $class = $idx == 0 ? 'active' : '';
            echo '
                <div data-idx="'.$idx.'" class="gallery-img-container '.$class.'">
                    <img src="assets/'.$slug.'/compressed/3000px/'.$img_src.'" />
                </div>
            ';
        }
        ?>
        <div class="gallery-btn villa-img-arrow next">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                <path d="m9 18 6-6-6-6"/>
            </svg>
        </div>
        <div id="current-img-num">
            <span>1</span>/<?php echo count($img_src_arr); ?>
        </div>
    </div>

    <script>

        function updateCurrentImgNum() {
            const idx = $("#image-gallery .gallery-img-container.active").data('idx');
            $("#current-img-num span").text(idx + 1);
        }

        function openGallery() {
            $('html').addClass('viewing');
            updateCurrentImgNum();
        }

        $("#carousel-img-count").on('click', function() {
            const active = $("#show-carousel-container .show-carousel-img.active");
            const idx = active.find('img').data('idx');
            $("#image-gallery .gallery-img-container.active").removeClass('active');
            $("#image-gallery .gallery-img-container").eq(idx).addClass('active');
            openGallery();
        });

        $("#image-gallery .villa-img-arrow").on('click', function() {
            if($('#image-gallery').hasClass('sliding')) return;
            $("#image-gallery").addClass('sliding');
            if ($(this).hasClass('next')) {
                const active = $("#image-gallery .gallery-img-container.active");
                const next = active.next('.gallery-img-container');
                if (next.length) {
                    active.removeClass('active');
                    next.addClass('active');
                } else {
                    active.removeClass('active');
                    $('.gallery-img-container').first('.gallery-img-container').addClass('active');
                }
            } else {
                const active = $("#image-gallery .gallery-img-container.active");
                const prev = active.prev('.gallery-img-container');
                if (prev.length) {
                    active.removeClass('active');
                    prev.addClass('active');
                } else {
                    active.removeClass('active');
                    $('.gallery-img-container').last('.gallery-img-container').addClass('active');
                }
            }

            updateCurrentImgNum();
            setTimeout(() => $('#image-gallery').removeClass('sliding'), 510);
        });

        $(".show-carousel-img").on('click', function() {
            const idx = $(this).find('img').data('idx');
            $("#image-gallery .gallery-img-container.active").removeClass('active');
            $("#image-gallery .gallery-img-container").eq(idx).addClass('active');
            openGallery();
        });
        
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