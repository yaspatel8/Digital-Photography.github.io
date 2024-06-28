<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from product_image where id=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:product_image.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>