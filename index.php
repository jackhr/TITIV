<?php
$title = "title";
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