<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from catrgory_master where cid=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:category.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>