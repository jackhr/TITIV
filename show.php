<?php
include_once 'includes/header.php';
$villa = $_GET['villa'];
$title = "Titi Vacation Homes - $villa";
$page = "show";

$villa_query = "SELECT * FROM villas WHERE name = '$villa';";
$result = mysqli_query($con, $villa_query);
$villa = mysqli_fetch_assoc($result);
?>

<h1><?php echo $villa['name']; ?></h1>

<?php include_once 'includes/footer.php' ?>