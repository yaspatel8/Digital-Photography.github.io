<?php

include_once("connection.php");

$id=$_GET['id'];

$qry=mysqli_query($con,"delete from booking_master where bid='$id'");
if($qry)
{
    echo "<script>alert('Order Cancle....');</script>";
    echo "<script>window.location.assign('vieworder.php');</script>";
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>