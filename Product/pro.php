<?php 
    include_once("hhh.php");
    include_once("connection.php");
?>
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
<?php 
    include_once("fff.php");
?>