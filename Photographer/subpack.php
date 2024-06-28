<?php
session_start();
include_once("hhh.php");
include_once("connection.php");
$cid = $_GET['cid'];
$subcategories = mysqli_query($con, "select * from packagesub_category inner join packagecategory_master on packagesub_category.cid=packagecategory_master.cid where packagesub_category.cid=$cid");
($row1 = mysqli_fetch_array($subcategories))

?>

<div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5"> <?php echo $row1['cname']; ?> </h2>
    </div>
</div>
<!-- End Page Header -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-md-12 col-lg-12">
        <div class="row row-sm">
            <?php
            $categories = mysqli_query($con, "select * from packagesub_category where cid=$cid");
            while ($row = mysqli_fetch_array($categories)) {
            ?>
                <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                    <div class="card custom-card">
                        <div class="p-0 ht-100p">
                            <div class="product-grid">
                                <div class="product-image">

                                    <img class="pic-1" alt="product-image-1" src="<?php echo "../package_image/$row[sphoto]" ?>" style="height: 40vh;">

                                    <!-- <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                <span class="product-discount-label">-33%</span>
                                <div class="product-link">
                                    <a href="ecommerce-cart.html">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Add to cart</span>
                                    </a>
                                    <a href="ecommerce-product-details.html">
                                        <i class="fas fa-eye"></i>
                                        <span>Quick View</span>
                                    </a>
                                </div> -->
                                </div>

                                <div class="product-content">
                                    <h3 class="title"><?php echo $row['sname']; ?></a></h3>
                                    <div class="price"><span class="text-danger"> &#8377; <?php echo $row['price'] ?>/- </span></div>
                                    <h6 class="mt-4 fs-16">Detail</h6>
                                    <p><?php echo $row['sdetail']; ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Row -->


<!-- END RIGHT-SIDEBAR -->

<!-- FOOTER -->


</body>

<!-- Mirrored from php.spruko.com/spruha/spruha/pages/ecommerce-products.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2023 07:41:14 GMT -->

</html>


<?php
include_once("fff.php");
?>