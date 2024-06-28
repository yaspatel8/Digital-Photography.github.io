<?php
include_once("connection.php");
include_once("hhh.php");
?>
<div class="slider-area section-padding-1">
    <div class="slider-active owl-carousel nav-style-1">
        <div class="single-slider bg-paleturquoise">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-content slider-animated-1">

                            <h1 class="animated" style="color: gray;"><br>New & unique <br>Products</h1>
                            
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-6 col-12 col-sm-6 pt-5">
                        <div class="slider-single-img slider-animated-1">
                            <img class="animated" src="image2.jpg" height="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pt-40 pb-70">
    <div class="container">
        <div class="section-title text-center mb-45">
            <h2>Categories</h2>
          
        </div>

        <div class="tab-content jump">
            <div class="row">
                <?php
                $qry = mysqli_query($con, "select * from catrgory_master where status=0");
                while ($row = mysqli_fetch_array($qry)) {
                ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-wrap product-border-1 mb-30">
                            <div class="product-img">
                            <?php    
                            echo "<a href=products.php?x=$row[0]>"
                            ?><img src="../product_image/<?php echo $row['photo']; ?>" alt="product" style="height: 50vh;width:50vh;"></a>


                            </div>
                            <div class="product-content product-content-padding text-center">
                                <h4><a href="products.php?x=<?php echo "$row[0]"; ?> "><?php echo $row['cname']; ?></a></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>

<div class="deal-area pt-100 pb-100 bg-img" style="background-image:url(assets/images/bg/bg-1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="deal-content text-center">
                    <h3>Sale 30%</h3>
                    <h2>Big Weekend Sale</h2>
                    <div class="timer">
                        <div data-countdown="2024/01/01"></div>
                    </div>
                    <div class="deal-btn default-btn btn-hover">
                        <a class="btn-size-xs btn-bg-theme btn-color black-color" href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pt-30">
    <div class="section-title text-center mb-45">
        <h2>All Products</h2>
       
    </div>

    <div class="tab-content jump">
        <div class="row">
        
            <?php $qry = mysqli_query($con, "select * from product_master inner join catrgory_master on product_master.cid=catrgory_master.cid where catrgory_master.status=0 and product_master.status=0");
                while ($row = mysqli_fetch_array($qry)) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="product-wrap product-border-1 mb-30">
                    <div class="product-img">
                        <a href="product_detail.php?x=<?php echo $row[0] ?>"><img src="../product_image/<?php echo "$row[6]"?>" alt="product" style="height: 50vh;width:50vh;"></a>
                       
                        <div class="product-action">
                            
                            
                            <a title="Add To Cart" href="checksession.php?x=<?php echo $row[0] ?>"><i class="la la-shopping-cart"></i></a>
                            <i class="la la-shopping-cart"></i></a>
                            
                        </div>
                    </div>
                    <div class="product-content product-content-padding text-center">
                        <h4><a href="product_detail.php?x=<?php echo $row[0] ?>"><?php echo $row['pname'] ?></a></h4>
                        
                        <div class="product-price">
                            <span>&#8377;<?php echo $row['price'] ?></span>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="instagram-feed-thumb pb-100">
    <div id="instafeed" class="instafeed-style"></div>
</div>
<?php include_once("fff.php"); ?>

</body>


<!-- Mirrored from htmldemo.net/eliza/eliza/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Mar 2024 13:14:45 GMT -->

</html>