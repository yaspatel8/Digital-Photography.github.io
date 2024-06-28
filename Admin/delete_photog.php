<?php


include_once("connection.php");
$id=$_GET['x'];

$qry = mysqli_query($con,"delete from photographer where id=$id");
header("location:photoreq.php");

?>