<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from packagecategory_master where cid=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:packagecategory.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>