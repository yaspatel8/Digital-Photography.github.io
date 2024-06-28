
<?php
include_once("connection.php");
// error_reporting(1);

$id = $_GET['id'];



if ($id) {
    $qry = mysqli_query($con, "update packagecategory_master set status=1 where cid=$id");
    
    $qry2 = mysqli_query($con, "update packagesub_category set status=1 where cid=$id");
    header('location:packagecategory.php');
    
}

?>