<?php
session_start();
include('connection.php');

$uid = $_SESSION['uid'];
if (!isset($uid))
    header('location:../user/login.php');
$pid = $_GET['x'];
$cdate = date('Y/m/d');
if (!isset($uid))
    header('location:../user/registation.php');

$qry1 = mysqli_query($con, "select * from addtocart where pid='$pid' and uid=$uid");
if (mysqli_num_rows($qry1) > 0) {
    echo "<script> alert('Product already inseted You not insert again!..')
        window.location.assign('addtocart.php');</script>";
} else {
    $q = mysqli_query($con, "insert into addtocart values('',$uid,$pid,1,'$cdate',0)");
    
        echo "<script>alert('Your product has been added into the cart')
            window.location.assign('addtocart.php');</script>";
}
