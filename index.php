<?php
$title = "Titi Vacation Homes";
$page = "index";
include_once 'includes/header.php'
?>
    <div class="slideshow-container">
        <div class="slide active" style="background-image: url('http://www.villaordnance.com/images/slideshows/homepage/image-villa-aerial-30171.jpg');"></div>
        <div class="slide" style="background-image: url('http://www.villaordnance.com/images/galleries/villa-ordnance/TITI-VillaOrd-PoolToSea-1903JMR3999.jpg');"></div>
        <div class="slide" style="background-image: url('http://www.villaordnance.com/images/galleries/villa-ordnance/TITI-VillaOrd-DiningExt-1903JMR3712.jpg');"></div>
    </div>
    <div id="intro">
        <div>
            <p>Discover the charm of Antigua's southern hideaways with "Titi Vacation Homes," your gateway to an authentic Caribbean experience. Our collection features five cozy villas, nestled in the laid-back ambiance of Falmouth, Picadilly, and English Harbour.</p>
        </div>
        <div id="intro-chevron">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
        </div>
    </div>
    <div id="villas">
        <h1>The Villas</h1>
        <div id="villas-container">
            <?php
            $title = "Villa Ordnance";
            $img_src = "http://www.villaordnance.com/images/galleries/villa-ordnance/TITI-VillaOrd-Aerial-1903JMR30171.jpg";
            $guests = 8;
            $beds = 5;
            $baths = 4;
            include('includes/villa.php');
            
            $title = "Casa Chiesa";
            $img_src = "http://www.villaordnance.com/images/galleries/casa-chiesa/TITI-CasaChiesa-06Pool-1812JMR2231.jpg";
            $guests = 6;
            $beds = 3;
            $baths = 4.5;
            include('includes/villa.php');

            $title = "Little Rock Cottage";
            $img_src = "http://www.villaordnance.com/images/galleries/little-rock/TTIT-LittleRock-PoolArea-1910JMR23810.jpg";
            $guests = 3;
            $beds = 2;
            $baths = 1;
            include('includes/villa.php');
            
            $title = "Goat Rock Studio";
            $img_src = "https://a0.muscache.com/im/pictures/miso/Hosting-834245096444883583/original/50bd6155-7c70-412f-9ceb-f78c26b0111f.jpeg?aki_policy=large";
            $guests = 2;
            $beds = 1;
            $baths = 1;
            include('includes/villa.php');
            
            $title = "Goat Hill Studio";
            $img_src = "https://a0.muscache.com/im/pictures/miso/Hosting-837292377895370898/original/09d281bb-f90b-4e4e-817b-636f1b71d068.jpeg?aki_policy=large";
            $guests = 2;
            $beds = 1;
            $baths = 1;
            include('includes/villa.php');
            ?>
        </div>
    </div>
    <script>
        let currentSlide = 0;
        const slides = $('.slide');

        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            slides.removeClass('active');
            $(slides[currentSlide]).addClass('active');
        }, 5000);
    </script>
<?php include_once 'includes/footer.php' ?>