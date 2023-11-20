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

    $ammenities_query = "SELECT * FROM ammenities JOIN villas_ammenities ON ammenities.id = villas_ammenities.ammenity_id WHERE villas_ammenities.villa_id = {$villa['id']};";
    $result = mysqli_query($con, $ammenities_query);
    while($row = mysqli_fetch_assoc($result)) $villa_ammenities[$row['id']] = $row;

    $query = "SELECT * FROM ammenity_types;";
    $result = mysqli_query($con, $query);
    $ammenity_types = [];
    
    while($row = mysqli_fetch_assoc($result)) $ammenity_types[$row['id']] = $row;

    $final_types = [];
    $not_included = [];
    
    foreach($villa_ammenities as $id => $ammenity) {
        if ($ammenity_types[$ammenity['type_id']]['name'] == 'Not Included') {
            $not_included[$ammenity['type_id']]['name'] = $ammenity_types[$ammenity['type_id']]['name'];
            $not_included[$ammenity['type_id']]['ammenities'][] = $ammenity;
        } else {
            $final_types[$ammenity['type_id']]['name'] = $ammenity_types[$ammenity['type_id']]['name'];
            $final_types[$ammenity['type_id']]['ammenities'][] = $ammenity;
        }
    }

    usort($final_types, function($a, $b) {
        return strcmp($a['name'], $b['name']);
    });

    $final_types = array_merge($final_types, $not_included);
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

$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

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
            <div class="sub-header-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                <a href="<?php echo $villa['address_link']; ?>" target="_blank"><?php echo $villa['address']; ?></a>
                <span>•</span>
                <div class="all-ammenities" onclick="$('.ammenities.modal').addClass('show');$('html').addClass('viewing-ammenities');">Show All <?php echo count($villa_ammenities); ?> Amenities</div>
                <span>•</span>
                <div class="villa-icon-pair share" onclick="$('.share.modal').addClass('show');">
                    <?php echo $svg_lookup['share']; ?>
                    <span>Share</span>
                </div>
            </div>
        </div>
        <div class="first-four">
            <div class="villa-icon-pair">
                <?php echo $svg_lookup['guests']; ?>
                <span><?php echo $villa['guests']; ?> Guests</span>
            </div>
            <div class="villa-icon-pair">
                <?php echo $svg_lookup['beds']; ?>
                <span><?php echo $villa['bedrooms']; ?> Bedroom<?php echo $villa['bedrooms'] > 1 ? 's' : ''; ?></span>
            </div>
            <div class="villa-icon-pair">
                <?php echo $svg_lookup['beds']; ?>
                <span><?php echo $villa['beds']; ?> Beds</span>
            </div>
            <div class="villa-icon-pair">
                <?php echo $svg_lookup['baths']; ?>
                <span><?php echo $villa['baths']; ?> Bathrooms</span>
            </div>
        </div>
        <div class="details-separator"></div>
        <div class="policies">
            <ul>
                <?php
                $policies = explode("<br>", $villa['policies']);
                foreach($policies as $policy) echo "<li>$policy</li>";
                ?>
            </ul>
        </div>
        <div class="details-separator"></div>
        <div class="pricing">
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

    <div class="modal share">
        <div class="modal-content">
            <div class="modal-close"><?php echo $svg_lookup['close']; ?></div>
            <div class="modal-header">
                <img src="assets/<?php echo $slug; ?>/compressed/1500px/<?php echo $villa['img_slug_1']; ?>.jpg">
                <div>
                    <h1><?php echo $villa['name']; ?></h1>
                    <span><?php echo $villa['address']; ?></span>
                </div>
            </div>
            <div class="modal-body">
                <div class="share-btn copy" data-link="<?php echo $link; ?>">
                    <?php echo $svg_lookup['copy']; ?>
                    <span>Copy Link</span>
                </div>
                <a class="share-btn email" href="mailto:?subject=Look at This Titi Vacation Rental Villa I Found&body=<?php echo $link; ?>">
                    <?php echo $svg_lookup['mail']; ?>
                    <span>Email</span>
                </a>
            </div>
        </div>
    </div>

    <div class="modal ammenities">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-close"><?php echo $svg_lookup['close']; ?></div>
                <h1>All Ammenities (<?php echo count($villa_ammenities); ?>)</h1>
            </div>
            <div class="modal-body">
                <?php foreach($final_types as $id => $type) { ?>
                    <div class='ammenity-type'>
                        <h1><?php echo $type['name']; ?></h1>
                        <div class='ammenities-container'>
                            <?php foreach($type['ammenities'] as $ammenity) {
                                echo "
                                <div class='villa-icon-pair'>
                                    {$ammenity_lookup[$ammenity['name']]}
                                    <span data-id='{$ammenity['id']}'>{$ammenity['name']}</span>
                                </div>
                                ";
                            } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>

        $(".modal-close").on('click', function() {
            $(this).closest('.modal').removeClass('show');
            $('html').removeClass('viewing-ammenities');
        });

        $(".share-btn.copy").on('click', function() {
            const link = $(this).data('link');
            const temp = $("<input>");
            $("body").append(temp);
            temp.val(link).select();
            document.execCommand("copy");
            temp.remove();
            $(this).find('span').text('Copied!');
            setTimeout(() => $(this).find('span').text('Copy Link'), 1000);
        });

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

        $(".modal").on('click', function(e) {
            if ($(e.target).hasClass('modal')) {
                $(this).removeClass('show');
                $('html').removeClass('viewing-ammenities');
            }
        });

        var containerClass = "._11jhslp";
        var textClass = ".m1ec1bsa";
        var iconClass = ".lhg7v4y";

        var iconsArr = document.querySelectorAll(`${containerClass} ${iconClass}`);
        var textArr = document.querySelectorAll(`${containerClass} ${textClass}`);

        var final_test = {};

        for(let i = 0; i < 63; i++) {
            const text = textArr[i].innerText;
            const icon = iconsArr[0].children[0].children[0];

            final_test[text] = icon.outerHTML;
        }

    </script>

<?php include_once 'includes/footer.php' ?>