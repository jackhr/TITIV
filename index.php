<?php
$title = "Titi Vacation Homes";
$page = "index";
include_once 'includes/header.php'
?>
    <div class="slideshow-container">
        <div style="background-image: url('assets/AIR03-TITI-VillaOrd-Aerial-1903JMR30152.jpg');" class="slide active"></div>
        <div style="background-image: url('assets/AIR09-TITI-VillaOrd-Aerial-1903JMR30062.jpg');" class="slide" ></div>
        <div style="background-image: url('assets/CL01-TITI-CasaChiesa-FrontVerandah-1812JMR2260-Edit.jpg');" class="slide" ></div>
        <div style="background-image: url('assets/CL06-TITI-CasaChiesa-LivingRoom-1812JMR2037-Edit.jpg');" class="slide" ></div>
        <div style="background-image: url('assets/CL08-TITI-VillaOrd-DiningExt-1903JMR3759.jpg');" class="slide" ></div>
        <div style="background-image: url('assets/CL10-TITI-VillaOrd-LivingArea-1903JMR3840.jpg');" class="slide" ></div>
        <div style="background-image: url('assets/CL18-TITI-CasaChiesa-Air-1812JMR0003-Edit.jpg');" class="slide" ></div>
        <div style="background-image: url('assets/CL18-TITI-VillaOrd-BedGuest3-1903JMR3825.jpg');" class="slide" ></div>
    </div>
    <div id="villas">
        <h1>Titi Vacation Homes</h1>
        <p>Discover the charm of Antigua's southern hideaways with "Titi Vacation Homes," your gateway to an authentic Caribbean experience. Our collection features five cozy villas, nestled in the laid-back ambiance of Falmouth, Picadilly, and English Harbour.</p>
        <div id="villas-container">
            <?php
            $title = "Villa Ordnance";
            $img_src = "http://www.villaordnance.com/images/galleries/villa-ordnance/TITI-VillaOrd-Aerial-1903JMR30171.jpg";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/villa-ordnance-english-harbour.en-gb.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/820907538275321428";
            $guests = 8;
            $beds = 5;
            $baths = 4;
            include('includes/villa.php');
            
            $title = "Casa Chiesa";
            $img_src = "http://www.villaordnance.com/images/galleries/casa-chiesa/TITI-CasaChiesa-06Pool-1812JMR2231.jpg";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/villa-ordnance-st-pauls.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/827778182019020646";
            $guests = 6;
            $beds = 3;
            $baths = 4.5;
            include('includes/villa.php');
            
            $title = "Little Rock Cottage";
            $img_src = "http://www.villaordnance.com/images/galleries/little-rock/TTIT-LittleRock-PoolArea-1910JMR23810.jpg";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/little-rock-cottage-piccadilly.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/828124397400578980";
            $guests = 3;
            $beds = 2;
            $baths = 1;
            include('includes/villa.php');
            
            $title = "Goat Rock Studio";
            $img_src = "https://a0.muscache.com/im/pictures/miso/Hosting-834245096444883583/original/50bd6155-7c70-412f-9ceb-f78c26b0111f.jpeg?aki_policy=large";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/little-rock-cottage-piccadilly1.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/834245096444883583";
            $guests = 2;
            $beds = 1;
            $baths = 1;
            include('includes/villa.php');
            
            $title = "Goat Hill Studio";
            $img_src = "https://a0.muscache.com/im/pictures/miso/Hosting-837292377895370898/original/09d281bb-f90b-4e4e-817b-636f1b71d068.jpeg?aki_policy=large";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/little-rock-cottage-piccadilly1.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/837292377895370898";
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

        // This function hides all $('.booking-btns') unless the click was on a $('.book-now-container') or within a $('.booking-btns')
        $(document).on('click', function(e) {
            if ($(e.target).closest('.book-now-container').length) {
                $('.booking-btns').removeClass('show');
                $(e.target).closest('.villa-footer').find('.booking-btns').toggleClass('show');
            } else if (!$(e.target).closest('.book-now-container').length) {
                $('.booking-btns').removeClass('show');
            }
        });
    </script>
<?php include_once 'includes/footer.php' ?>