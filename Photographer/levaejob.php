<?php
session_start();
include_once("connection.php");

$id = $_SESSION['id'];
echo "$id";

    $qry = mysqli_query($con,"delete from photographer where id=$id");
    header("location:registation.php");
?>
