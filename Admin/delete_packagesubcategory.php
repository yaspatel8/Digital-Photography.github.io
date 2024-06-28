<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from packagesub_category where sid=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:packagesub_categoryview.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>