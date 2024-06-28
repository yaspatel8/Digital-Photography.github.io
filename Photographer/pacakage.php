<?php
session_start();
include_once("hhh.php");
include_once("connection.php");
?>


<!-- Page Header -->
<div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Pacakage</h2>
    </div>
</div>
<!-- End Page Header -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-md-12 col-lg-12">
        <div class="row row-sm">
            <?php $categories = mysqli_query($con, "select * from packagecategory_master where status=0");
							while ($row = mysqli_fetch_array($categories)) { ?>
            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                <div class="card custom-card">
                    <div class="p-0 ht-100p">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="subpack.php?cid=<?php echo $row['cid'] ?>" class="image">
                                    <img class="pic-1" alt="product-image-1" src="<?php echo "../package_image/$row[photo]" ?>" style="height: 40vh;">
                                    
                                </a>
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
                                <h3 class="title" ><?php echo $row['cname']; ?></a></h3>
                                <a href="subpack.php?cid=<?php echo $row['cid'] ?>"><div class="price"><span class="text-danger">View Sub Pacakage</span></div></a>
                                <!-- <ul class="rating">
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="fas fa-star"></li>
                                    <li class="far fa-star"></li>
                                </ul> -->
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