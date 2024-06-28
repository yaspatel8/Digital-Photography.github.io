<?php

include("packageconnection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from package_master where pid=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:package_view.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>