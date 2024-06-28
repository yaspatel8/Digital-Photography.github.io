<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from sub_category where sid=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:sub_catview.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>