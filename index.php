<?php
$title = "Titi Vacation Homes";
$page = "index";
include_once 'includes/header.php'
?>
    <div class="slideshow-container">
        <div style="background-image: url('assets/Villa_Ordnance/aerial-1.jpg');" class="slide active"></div>
        <div style="background-image: url('assets/Villa_Ordnance/aerial-2.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Villa_Ordnance/aerial-3.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Villa_Ordnance/dining-exterior.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Villa_Ordnance/guest-bedroom.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Villa_Ordnance/living-area.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Casa_Chiesa/front-veranda.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Casa_Chiesa/living-room.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Casa_Chiesa/pool.jpg');" class="slide" ></div>
        <div style="background-image: url('assets/Little_Rock_Cottage/bedroom.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Little_Rock_Cottage/living-area.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Little_Rock_Cottage/pool-area.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Goat_Rock_Studio/interior.jpg');" class="slide"></div>
        <div style="background-image: url('assets/Goat_Rock_Studio/pool-area.jpg');" class="slide"></div>
    </div>
    <div id="villas">
        <h1>Titi Vacation Homes</h1>
        <p>Discover the charm of Antigua's southern hideaways with "Titi Vacation Homes," your gateway to an authentic Caribbean experience. Our collection features five cozy villas, nestled in the laid-back ambiance of Falmouth, Picadilly, and English Harbour.</p>
        <div id="villas-container">
            <?php
            $title = "Villa Ordnance";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/villa-ordnance-english-harbour.en-gb.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/820907538275321428";
            $guests = 8;
            $beds = 5;
            $baths = 4;
            $img_src_arr = [ "aerial-1", "aerial-2", "aerial-3", "dining-exterior", "guest-bedroom", "living-area" ];
            include('includes/villa.php');
            
            $title = "Casa Chiesa";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/villa-ordnance-st-pauls.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/827778182019020646";
            $guests = 6;
            $beds = 3;
            $baths = 4.5;
            $img_src_arr = [ "front-veranda", "living-room", "pool" ];
            include('includes/villa.php');
            
            $title = "Little Rock Cottage";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/little-rock-cottage-piccadilly.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/828124397400578980";
            $guests = 3;
            $beds = 2;
            $baths = 1;
            $img_src_arr = [ "bedroom", "living-area", "pool-area" ];
            include('includes/villa.php');
            
            $title = "Goat Rock Studio";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/little-rock-cottage-piccadilly1.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/834245096444883583";
            $guests = 2;
            $beds = 1;
            $baths = 1;
            $img_src_arr = [ "interior", "pool-area" ];
            include('includes/villa.php');
            
            $title = "Goat Hill Studio";
            $booking_dot_com_link = "https://www.booking.com/hotel/ag/little-rock-cottage-piccadilly1.html";
            $air_bnb_link = "https://www.airbnb.com/rooms/837292377895370898";
            $guests = 2;
            $beds = 1;
            $baths = 1;
            $img_src_arr = [ "interior", "pool-area" ];
            include('includes/villa.php');
            ?>
        </div>
    </div>
    <script>

        const STATE = {
            currentSlide: 0,
            panelWidth: $('.villa').width()
        }

        let currentSlide = 0;
        const slides = $('.slide');

        setInterval(() => {
            STATE.currentSlide = (STATE.currentSlide + 1) % slides.length;
            slides.removeClass('active');
            $(slides[STATE.currentSlide]).addClass('active');
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

        $(".villa-img-arrow").off('click').on('click', function() {
            if ($(this).hasClass('disabled')) return;
            const carousel = $(this).siblings('.villa-img-inner');
            const activeImg = carousel.find('img.active');
            
            if ($(this).hasClass('next')) {
                const factor = activeImg.data('idx') * STATE.panelWidth;
                if (activeImg.next().length) {
                    activeImg.next().addClass('active');
                    activeImg.removeClass('active');
                }
                if (!activeImg.next().next().length) {
                    $(this).addClass('disabled');
                }
                carousel.css('transform', `translateX(${(factor + STATE.panelWidth) * -1}px)`);
                $(this).siblings('.prev').removeClass('disabled');
            } else {
                const factor = (activeImg.data('idx') - 1) * STATE.panelWidth;
                if (activeImg.prev().length) {
                    activeImg.prev().addClass('active');
                    activeImg.removeClass('active');
                }
                if (!activeImg.prev().prev().length) {
                    $(this).addClass('disabled');
                }
                carousel.css('transform', `translateX(${factor * -1}px)`);
                $(this).siblings('.next').removeClass('disabled');
            }
        });
    </script>
<?php include_once 'includes/footer.php' ?>