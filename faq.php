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
                <h3><img src="assets/icons/dropdown.svg" width="24"> How old do I need to be to drive in Antigua?</h3>
                <p>Drivers must be between the ages of 22 and 80 years old.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Can I use my driving license?</h3>
                <p>Even if you have an international Driver's License, you must purchase a local driver's permit to be able to drive a car in Antigua and Barbuda at a cost of US$ 20 (EC$50). Even if you are the holder of an International Driver's License you are still required to purchase one. They cost US$20 US or EC$50 whether you purchase it from us, the police station, or the Transport Board. We pre-purchase them for your convenience. They are valid for 3 months and our agent will need to see your valid license from your country of residence to issue the temporary one. We accept cash for the licenses.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Is there a charge for additional drivers?</h3>
                <p>Additional drivers are allowed at no additional cost. However, each driver should have a local driver's permit.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">What happens if I return the vehicle late?</h3>
                <p>If a vehicle is not returned at the agreed time there will be an additional charge of US$10.00 - US$20.00 per hour.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">How is driving in Antigua?</h3>
                <p>You should always drive with care and attention. The national speed limit is 40mph and there is a limit of 20 mph in built-up areas. Motorists drive on the left in Antigua and Barbuda. Main roads are generally well maintained, although they often lack road markings. Potholes, even on main roads, and poorly marked speed bumps can catch the unwary. Overtaking on blind corners and cutting corners when turning right are commonplace. Stray cattle, goats, and dogs are an additional hazard. Pavements are few and very narrow so pedestrians often walk on the road.</p>
                <p>Most streets are lit at night, but not with as many streetlights as in the U.K. and U.S. Recently a greater effort has been made to provide directional road signage, especially to tourist attractions.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Gas Stations</h3>
                <p>There are quite a few gas/petrol stations throughout the island. Some are full-service stations that provide tire changes/repair and other services, and others are just to get gas/petrol/diesel. In Antigua, the service station attendant pumps your gas. You do not pump your own gas. You simply tell them how much you need, and they will take care of the rest.</p>
                <p>All vehicles are rented with a full tank of gas and if on return it is not full the total cost to refill will be tripled and charges plus a US$10.00 fee.</p>
            </div>


            <h2>Insurance</h2>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Insurance</h3>
                <p>Included within the rate of hire the vehicle is third-party insured which will protect authorized drivers if they injure someone or damage someone else's property. Additionally driver's should produce proof of comprehensive insurance or purchase CDW insurance from us.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Optional Collision Damage Waiver (CDW)</h3>
                <p>Collision Damage Waiver (CDW) will relieve you of your responsibility for all or part of any rental car damage under the terms of the car rental agreement that may occur during the rental period and is highly recommended.  Optional basic excess waiver (CDW) is available from us at US$10.00, US$15.00, US$20.00, and US$30.00 depending on the vehicle.  If this CDW is purchased, responsibility for the deductible is reduced to US$1500.00, US$2000.00, US$2500.00, or US$3000.00 depending on the option taken. This does not include damage to rims, tyres, interior, windshields, electronic keys, and key fobs.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Tyre damage</h3>
                <p>Damage to rims and tyres is not covered by the CDW. In case of a flat tyre there are many garages around that the island that can repair the tyre quickly for a small fee. Titi Rent a Car can also fix a flat tyre at a cost of US$35.00. If a tyre or rim has been damaged beyond repair, the hirer will be charged for the cost of replacement.</p>
            </div>


            <h2>Other information</h2>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Child Seats</h3>
                <p>Baby, toddler and booster seats are available at US$5.00 per day.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Cleaning Fee</h3>
                <p>We ask that you take some measure of care with our vehicles during your rental period as a cleaning fee of US$100.00 may be charged in the event of a return of a vehicle with an excessively dirty, stained, sandy or wet interior.</p>
            </div>
            <div class="question">
                <h3><img src="assets/icons/dropdown.svg" width="24">Security Deposit</h3>
                <p>Please note that we do require a blank, signed, credit card charge slip to hold for the duration of your rental for incidental damages up to the deductible/excess limit on the CDW coverage (in lieu of placing a pre-authorization on your credit card). This slip is destroyed at the end of the rental upon return of the vehicle in the same condition as delivered at the beginning of your rental, or arrangements can be made with our delivery personnel at the time of delivery for the return of the voucher to you at the end of the rental.</p>
            </div>
			<div class="clear"></div>
		</div>
	</section>

    <script>

        $(".question").on('click', function() {
            $(this).toggleClass('showing');
        });
        
    </script>

<?php include_once 'includes/footer.php'; ?>
