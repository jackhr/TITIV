<?php include_once 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="description" content="<?php echo $description ?>">
	<meta name="robots" content="noindex">
	<title><?php echo $title ?></title>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-palmtree"><path d="M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4"/><path d="M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3"/><path d="M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35z"/><path d="M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-palmtree"><path d="M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4"/><path d="M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3"/><path d="M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35z"/><path d="M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14"/></svg>
            </a>
			<nav>
                <div class="custom-dropdown">
                    <span id="villa-toggle" class="<?php if($page=='index') echo 'current' ?>">Villas</span>
                    <div class="dropdown-content hidden">
                        <?php
                        if ($prod) {
                            $villas_query = "SELECT name FROM villas;";
                            $result = mysqli_query($con, $villas_query);
                            $villas = [];
                            
                            while($v = mysqli_fetch_assoc($result)) $villas[] = $v;
    
                            foreach($villas as $v) echo "<a class='dropdown-item' href='show.php?villa={$v['name']}'>{$v['name']}</a>";
                        } else { ?>
                            <a class='dropdown-item' href='show.php?villa=Villa Ordnance'>Villa Ordnance</a>
                            <a class='dropdown-item' href='show.php?villa=Casa Chiesa'>Casa Chiesa</a>
                            <a class='dropdown-item' href='show.php?villa=Little Rock Cottage'>Little Rock Cottage</a>
                            <a class='dropdown-item' href='show.php?villa=Goat Hill Studio'>Goat Hill Studio</a>
                            <a class='dropdown-item' href='show.php?villa=Goat Rock Studio'>Goat Rock Studio</a>
                        <?php } ?>
                    </div>
                </div>
				<a class="<?php if($page=='information') echo 'current' ?>" href="general-info.php"><span>Info & FAQ</span></a>
                <a target="_blank" href="http://www.titirentacarantigua.com/"><span>Car Rentals<span></a>
                <a class="<?php if($page=='contact') echo 'current' ?>" href="contact.php"><span>Contact<span></a>
			</nav>
			<a id="mobile-menu"><img src="images/menu.png" width="40" height="28" /></a>
		</div>
	</header>

    <script>

        $(document).on('click', e => {
            if ($("#villa-toggle").is(e.target)) {
                // If we are pressing the toggle, we want to toggle the dropdown
                return $(".dropdown-content").toggleClass('hidden');
            }

            if (!$('.dropdown-content').has(e.target).length && !$('.dropdown-content').is(e.target)) {
                // if we are not clicking on the dropdown or any of its children, we want to hide it
                $('.dropdown-content').addClass('hidden');
            }
        });
        
    </script>