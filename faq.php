<?php $page = 'information'; ?>
<?php $title = 'General Information Titi Rent-a-Car Antigua'; ?>
<?php $description = ''; ?>
<?php include_once 'includes/header.php'; ?>

	<section class="masthead background-img">
		<div class="background"></div>
		<div class="overlay"></div>
		<div class="section-inner-wrap">
			<hgroup>
				<h1>Frequently Asked Questions</h1>
			</hgroup>
		</div>
	</section>

	<section class="features background-solid">
		<div class="section-inner-wrap">
            <h2>General Information</h2>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24"> How many villas does your company offer for vacation rentals?</h3>
                <p>We currently have five individual villas available for vacation rentals.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">How do I make a reservation?</h3>
                <p>Reservations can made for each villa on either airbnb.com or booking.com. Links are provided on each villas' detail page.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Are pets allowed in the villas?</h3>
                <p>Unfortunately, we do not allow pets in our villas to ensure a comfortable and allergy-free environment for all guests.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">What is your cancellation policy?</h3>
                <p>Our cancellation policy is aligned with the terms and conditions outlined by Airbnb.com and Booking.com, the platforms through which we exclusively manage our bookings. For specific details regarding cancellations, we recommend consulting the respective policies on these websites.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Is there a minimum stay requirement?</h3>
                <p>Yes, there is a minimum stay requirement, which may vary depending on the season. Please check our website for specific details.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Are the villas child-friendly?</h3>
                <p>Yes, our villas are child-friendly. We can provide amenities such as cribs and high chairs upon request.</p>
            </div>
		</div>
	</section>

    <script>

        $(".question").on('click', function() {
            $(this).toggleClass('showing');
        });
        
    </script>

<?php include_once 'includes/footer.php'; ?>
