<?php
include 'connection.php';
$description = isset($description) ? $description : "Explore the charm of Antigua's southern hideaways with Titi Vacation Homes. Immerse yourself in a personal Caribbean experience through our collection of five cozy villas nestled in the laid-back ambiance of Falmouth, Picadilly, and English Harbour. Your gateway to relaxation and tranquility awaits.";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="robots" content="noindex">
    <meta name="keywords" content="villa rentals, luxury villas, vacation homes, holiday rentals, travel, caribbean rentals, antigua, antigua and barbuda, antigua rentals, titi-rent-a-car, titi">
	<meta name="description" content="<?php echo $description ?>">
    <meta property="og:title" content="Titi Vacation Homes">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:image" content="https://titivacationhomes.com/assets/villas/Villa_Ordnance/compressed/1500px/aerial-1.jpg">
    <meta property="og:url" content="https://titivacationhomes.com">
	<title><?php echo $title ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Poppins:ital,wght@0,200;0,400;0,700;1,200;1,400;1,700&display=swap" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="style.css">
    <script src="js/jquery-1.8.2.min.js"></script>
</head>
<body id="<?php echo $page ?>-page">

	<header>
		<div class="section-inner-wrap">
			<a href="index.php" class="logo-link">
                <img src="/assets/logos/TITIV-NewLogo.png" alt="Logo">
            </a>
            <?php
            for($i = 0; $i < 2; $i++) {
                $id_insert = $i == 1 ? 'id="mobile-nav"' : '';
                ?>
                <nav <?php echo $id_insert; ?>>
                    <?php if ($i == 1) { ?>
                        <div id="nav-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                <path d="M18 6 6 18"/>
                                <path d="m6 6 12 12"/>
                            </svg>
                        </div>
                    <?php } ?>
                    <a class="<?php if($page=='index') echo 'current' ?>" href="index.php"><span>Home</span></a>
                    <span class="nav-pipe">|</span>
                    <div class="custom-dropdown">
                        <span class="villa-toggle <?php if($page=='show') echo 'current' ?>">Villas</span>
                        <div class="dropdown-content hidden">
                            <?php if ($prod) {
                                $villas_query = "SELECT name FROM villas;";
                                $result = mysqli_query($con, $villas_query);
                                $villas = [];
                                
                                while($v = mysqli_fetch_assoc($result)) $villas[] = $v;

                                foreach($villas as $v) echo "<a class='dropdown-item' href='show.php?villa={$v['name']}'>{$v['name']}</a>";
                            } else { ?>
                                <a class='dropdown-item <?php echo $_GET['villa'] === 'Villa Ordnance' ? 'current' : ''; ?>' href='show.php?villa=Villa Ordnance'><span>Villa Ordnance</span></a>
                                <a class='dropdown-item <?php echo $_GET['villa'] === 'Casa Chiesa' ? 'current' : ''; ?>' href='show.php?villa=Casa Chiesa'><span>Casa Chiesa</span></a>
                                <a class='dropdown-item <?php echo $_GET['villa'] === 'Little Rock Cottage' ? 'current' : ''; ?>' href='show.php?villa=Little Rock Cottage'><span>Little Rock Cottage</span></a>
                                <a class='dropdown-item <?php echo $_GET['villa'] === 'Goat Hill Studio' ? 'current' : ''; ?>' href='show.php?villa=Goat Hill Studio'><span>Goat Hill Studio</span></a>
                                <a class='dropdown-item <?php echo $_GET['villa'] === 'Goat Rock Studio' ? 'current' : ''; ?>' href='show.php?villa=Goat Rock Studio'><span>Goat Rock Studio</span></a>
                            <?php } ?>
                        </div>
                    </div>
                    <span class="nav-pipe">|</span>
                    <a class="<?php if($page=='information') echo 'current' ?>" href="faq.php"><span>Info & FAQ</span></a>
                    <span class="nav-pipe">|</span>
                    <a target="_blank" href="http://www.titirentacarantigua.com/"><span>Car Rentals<span></a>
                    <span class="nav-pipe">|</span>
                    <a class="<?php if($page=='contact') echo 'current' ?>" href="contact.php"><span>Contact<span></a>
                </nav>
            <?php } ?>
			<a id="mobile-menu"><img src="assets/icons/menu.png" width="40" height="28" /></a>
		</div>
	</header>

    <script>

        $(document).on('click', e => {
            if ($(".villa-toggle").is(e.target)) {
                // If we are pressing the toggle, we want to toggle the dropdown
                $('.dropdown-content').addClass('hidden');
                return $(e.target).siblings(".dropdown-content").toggleClass('hidden');
            }

            if (!$('.dropdown-content').has(e.target).length && !$('.dropdown-content').is(e.target)) {
                // if we are not clicking on the dropdown or any of its children, we want to hide it
                $('.dropdown-content').addClass('hidden');
            }
        });

        $('#mobile-menu').on('click', function(){
            $('header nav').addClass('showing');
            $('html').addClass('viewing-mobile-nav');
        });

        $("#nav-close").on('click', function() {
            $('header nav').removeClass('showing');
            $('html').removeClass('viewing-mobile-nav');
        })
        
    </script>