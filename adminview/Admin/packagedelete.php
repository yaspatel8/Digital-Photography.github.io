<?php

$conn = mysqli_connect("localhost", "root", "", "pdf");

$first_name = $_GET['id'];

$q = " DELETE FROM `bbm` WHERE first_name = '$first_name' ";

mysqli_query($conn, $q);
mysqli_close($conn);
header('location:packagedisplay.php');

?>
