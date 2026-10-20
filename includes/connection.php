<?php

if (is_file(__DIR__ . '/env.php')) {
    include_once __DIR__ . '/env.php';
}

$prod = $prod ?? false;

if ($prod)  {
    $con = mysqli_connect( $hostname, $username, $password, $database );
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
}

?>
