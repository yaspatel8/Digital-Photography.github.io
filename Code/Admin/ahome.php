<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
include_once("connection.php");
?>
<div class="page-leftheader">
    <h4 class="page-title mb-0 text-primary">Dashboard</h4>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">Total User
                <?php
                $qry = mysqli_query($con, "select * from user ");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="user.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">Total New Photographer Request
                <?php
                $qry = mysqli_query($con, "select * from photographer where status=0");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="photoreq.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">Total Photographer
                <?php
                $qry = mysqli_query($con, "select * from photographer where status=1");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="photographer.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
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
                <a href="packagecategory.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Total Package Categories Deactive
                <?php
                $qry = mysqli_query($con, "select * from packagecategory_master where status=1");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="packagecategory.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
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
                <a href="packagesub_categoryview.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Total Package Sub Categories deactive
                <?php
                $qry = mysqli_query($con, "select * from packagesub_category where status=1");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="packagesub_categoryview.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total Package Order
                <?php
                $qry = mysqli_query($con, "select * from booking_master");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="view_book.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Total Package Order Complete
                <?php
                $qry = mysqli_query($con, "select * from booking_master where status=1");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="view_book.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Total Package Order pending
                <?php
                $qry = mysqli_query($con, "select * from booking_master where status=0");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="view_book.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total Product category
                <?php
                $qry = mysqli_query($con, "select * from catrgory_master");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="category.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Total Product category Deactive
                <?php
                $qry = mysqli_query($con, "select * from catrgory_master where status=1");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="category.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total Product
                <?php
                $qry = mysqli_query($con, "select * from product_master");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="product_view.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Total Product Deactive
                <?php
                $qry = mysqli_query($con, "select * from product_master where status=1");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="product_view.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Total Order Compalated
                <?php
                $qry = mysqli_query($con, "select * from order_master where status=1");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="history.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Total Order Pending
                <?php
                $qry = mysqli_query($con, "select * from order_master where status=0");
                if ($row = mysqli_num_rows($qry)) {
                    echo "<h2 class='mb-0 pt-2 font-weight-bold'>" . $row . "</h2>";
                } else {
                    echo "<h4 class='mb-0 pt-2 font-weight-bold'>No data</h4>";
                }
                ?>

            </div>
            <div class="card-footer d-flex align-items-center justify-cintent-between">
                <a href="view_product.php" class="small text-white stretched-link">View Details</a>
                <div class="small text-white"><i class="angle fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
</div>
<?php
include("fff.php");
?>