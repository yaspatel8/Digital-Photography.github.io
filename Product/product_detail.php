<?php
include_once("hhh.php");
include_once("connection.php");
$id = $_GET['x'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="product-details-area pt-100 pb-100">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-img">
                    <?php
                    $qry = mysqli_query($con, "select * from product_master where pid=$id");
                    $row = mysqli_fetch_array($qry)
                    ?>
                        <img  src="../product_image/<?php echo $row['photo'];?>" height="300vh" width="300vh" data-zoom-image="../product_image/<?php echo $row['photo'];?>" alt="" />

                        <div id="gallery" class="mt-20 product-dec-slider">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?php
                    $qry = mysqli_query($con, "select * from product_master where pid=$id");
                    while ($row = mysqli_fetch_array($qry)) {
                    ?>
                        <div class="product-details-content ml-30">
                            <h2><?php echo $row['pname']; ?></h2>
                            <div class="product-details-price">
                                <span>&#8377; <?php echo $row['price']; ?> /-</span>

                            </div>

                            <p><?php echo $row['description']; ?></p>

                            <div class="pro-details-quality">
                                <div class="pro-details-cart btn-hover">
                                    <a href="checksession.php?x=<?php echo $row[0] ?>">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
include_once("fff.php");
?>