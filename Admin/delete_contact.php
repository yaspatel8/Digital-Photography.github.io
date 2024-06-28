<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from contact_us where id=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:contact_usview.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>