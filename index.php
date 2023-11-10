<?php
$title = "title";
$page = "index";
include_once 'includes/header.php'
?>
    <div id="intro">
        <h1>Welcome to Titi Vacation Rentals</h1>
        <p>Thank you for visiting our website.</p>
        <div class="overlay"></div>
    </div>
    <div class="slideshow-container">
        <div class="slide active" style="background-image: url('http://www.villaordnance.com/images/slideshows/homepage/image-villa-aerial-30171.jpg');"></div>
        <div class="slide" style="background-image: url('http://www.villaordnance.com/images/galleries/villa-ordnance/TITI-VillaOrd-PoolToSea-1903JMR3999.jpg');"></div>
        <div class="slide" style="background-image: url('http://www.villaordnance.com/images/galleries/villa-ordnance/TITI-VillaOrd-DiningExt-1903JMR3712.jpg');"></div>
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