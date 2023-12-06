<footer>
    <div class="section-inner-wrap">
        <a href="index.php" class="logo-link">
            <img src="/assets/logos/TITI-NewLogo2023-Homes(White)-v1.jpg" alt="Logo">
        </a>
        <p>Falmouth Harbour<br>St Paul's, Antigua</p>
        <p>Mon-Sat: 08:00 - 17:00 &nbsp; &bull; &nbsp; Sunday: 08:00 - 13:00</p>
        <p class="tel"><a href="tel:+1 (268) 764-6860">+1 (268) 764-6860</a> &nbsp; &bull; &nbsp; VHF #68 &nbsp; &bull; &nbsp; <a href="mailto:titirentals268@gmail.com">titirentals268@gmail.com</a></p>
        <nav>
            <div class="custom-dropdown">
                <span class="villa-toggle">Villas</span>
                <div class="dropdown-content hidden">
                    <?php if ($prod) {
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
            <a class="<?php if($page=='information') echo 'current' ?>" href="faq.php"><span>Info & FAQ</span></a>
            <a target="_blank" href="http://www.titirentacarantigua.com"><span>Car Rentals</span></a>
            <a class="<?php if($page=='contact') echo 'current' ?>" href="contact.php"><span>Contact</span></a>
        </nav>
        <p class="smallprint copyright">&copy; <?php echo date('Y'); ?> Titi Rent-a-Car</p>
    </div>
</footer>

</body>
</html>