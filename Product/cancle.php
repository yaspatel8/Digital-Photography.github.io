<?php

include_once("connection.php");

$id=$_GET['id'];

$qry=mysqli_query($con,"delete from addtocart where aid='$id'");
if($qry)
{
    // echo "<script>alert('Order Cancle....');</script>";
    echo "<script>window.location.assign('addtocart.php');</script>";
}
else
{
    echo "<script>alert('Not Cancle....');</script>";
}

?>