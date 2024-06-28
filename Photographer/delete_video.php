<?php

include_once("connection.php");

$vid=$_GET['x'];

$qry=mysqli_query($con,"delete from video where vid=$vid");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:video.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>