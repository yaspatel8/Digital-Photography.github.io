<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
// include_once("connection.php");
?>

<!-- Page Header -->

<div class="page-header">
    <div>
        <?php
        $qry = mysqli_query($con, "select * from photographer where id=$id");
        while ($row = mysqli_fetch_array($qry)) {
            echo "<h2 class='main-content-title tx-24 mg-b-5'>Welcome To " .  $row['name'] . "</h2>";
        }
        ?>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total Package order
                <?php
                $qry = mysqli_query($con, "select * from booking_master where pid=$id");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="order.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Total Package Complet
                <?php
                $qry = mysqli_query($con, "select * from booking_master where pid=$id and status=1");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="order.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">New Total Package Order(pending)
                <?php
                $qry = mysqli_query($con, "select * from booking_master where pid=$id and status=0");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="order.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">Total Video
                <?php
                $qry = mysqli_query($con, "select * from video where pid=$id");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="video.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">Total Photos
                <?php
                $qry = mysqli_query($con, "select * from gallery where pid=$id");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="gallery.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
            <div class="card-body">Total Package Categories
                <?php
                $qry = mysqli_query($con, "select * from packagecategory_master");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="pacakage.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
            <div class="card-body">Total Package Sub Categories
                <?php
                $qry = mysqli_query($con, "select * from packagesub_category");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="pacakage.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_adm.css">
</head>

</html>

<?php
include_once("fff.php");
?>