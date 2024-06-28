<?php
include('connection.php');
$aid=$_GET['cartid'];
$q1=mysqli_query($con,"select a.*,p.* from addtocart a , product_master p where a.pid=p.pid and aid=$aid");
$row1=mysqli_fetch_array($q1);
$cartqty=$row1['cartqty'];
$pqty=$row1['qty'];
if($pqty>$cartqty)
{
    $q=mysqli_query($con,"update addtocart set cartqty=cartqty+1 where aid=$aid ");
    if($q)
    header('location:addtocart.php');
}
else
{
    echo "<script>alert('Out of stock');
    window.location.assign('addtocart.php');</script>";
}
?>