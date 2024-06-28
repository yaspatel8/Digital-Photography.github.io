<?php
include_once("connection.php");
// error_reporting(1);

$cid = $_GET['cid'];



if ($cid) {
    $qry = mysqli_query($con, "update catrgory_master set status=1 where cid=$cid");
    
    $qry2 = mysqli_query($con, "update product_master set status=1 where cid=$cid");
    
    echo "<script>window.location.assign('category.php');</script>";
}

?>