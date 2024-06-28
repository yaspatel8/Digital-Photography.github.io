<?php
include ("connection.php");
error_reporting(1);

$cid = $_GET['cid'];
$pid = $_GET['pid'];


if ($sid) {
    $qry = mysqli_query($con, "update catrgory_master set status=1 where cid=$cid");
    $pname = "";
    $qry1 = mysqli_query($con, "select * from product_master where status=1 and cid=$cid");
    while ($row = mysqli_fetch_array($qry1)) {
        $pname = $pname . " , " . $row['pname'];
    }
    $qry2 = mysqli_query($con, "update product_master set status=1 where cid=$cid");
    echo "<script>alert('job $pname will also be disapproved.');</script>";
    echo "<script>window.location.assign('category.php');</script>";
}

if ($pid) {
    $qry = mysqli_query($con, "update product_master set status=1 where pid=$pid");
    header("location:product_view.php");
}
?>