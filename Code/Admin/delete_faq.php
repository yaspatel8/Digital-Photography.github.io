<?php

include("connection.php");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from faq where id=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:faqview.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>