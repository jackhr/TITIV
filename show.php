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
    if ($file == '.' || $file == '..') continue;
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
        <!-- <div class="show-carousel-inner">
        </div> -->
        <div class="villa-img-arrow next">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                <path d="m9 18 6-6-6-6"/>
            </svg>
        </div>
    </div>
    <h1><?php echo $villa['name']; ?></h1>

<?php include_once 'includes/footer.php' ?>