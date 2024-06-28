<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from product_master where pid=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:product_view.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>