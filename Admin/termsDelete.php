<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from terms where id=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:terms.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>