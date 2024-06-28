<?php

include_once("connection.php");

$gid=$_GET['x'];

$qry=mysqli_query($con,"delete from gallery where gid=$gid");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:gallery.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>