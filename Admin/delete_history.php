<?php

include_once("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from order_master where oid=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:history.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>