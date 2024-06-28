<?php
session_start();
if(!isset($_SESSION['uid']))
    header('location:../user/registation.php');
else
    $uid=$_SESSION['uid'];
include_once("hhh.php");
include_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .button-minus{
            width: 20%;
        }

        
        .button-plus{
            width: 20%;
        }
    </style>
</head>

<body>
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total=0;
                                $q=mysqli_query($con,"select * from addtocart where uid=$uid");
                                while($row=mysqli_fetch_array($q))
                                {
                                    $pid=$row['pid'];
                                    $q1=mysqli_query($con,"select * from product_master where pid=$pid");
                                    while($row1=mysqli_fetch_array($q1))
                                    {
                                ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="../product_image/<?php echo "$row1[photo]"; ?>" height=100 width=100>
                                        </td>
                                        <td class="product-name"><?php echo"$row1[pname]"; ?></td>
                                        <td class="product-price-cart"><span class="amount">&#8377;<?php echo"$row1[price]"; ?>/-</span></td>
                                        <td class="quantity__item">
                                    <div class="input-group w-auto justify-content-end align-items-center">
                               <?php
                                    echo "<a href=decree.php?cartid=$row[0] class='button-minus border rounded-circle  icon-shape icon-sm mx-1'>-</a>";?>
                                <input type="text"  value="<?php echo $row['cartqty'];?>" name="quantity" class="quantity-field border-0 text-center w-25" readonly>
                               <?php
                               echo "<a href=incree.php?cartid=$row[0] class='button-plus border rounded-circle icon-shape icon-sm lh-0'>+</a>"; ?>
                            </div>
                                    </td>  <td class="product-subtotal">&#8377;
                                        <?php 
                                        $subtotal=$row1['price']*$row['cartqty'];
                                        
                                        echo $subtotal;
                                      
                                        $total=$total+$subtotal;
                                        ?> /-
                                    </td>
                                        <td class="product-remove">
                                            <!-- <a href="#"><i class="la la-pencil"></i></a> -->
                                            <a href="cancle.php?id=<?php echo $row[0] ?>"><i class="la la-close"></i></a>
                                        </td>
                                    </tr>
                                <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="pro.php">Continue Shopping</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-12">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <h5>Total Amount <span>&#8377;
                                    <?php echo $total;
                                      $_SESSION['total']=$total;
                                ?> /-</span></h4>
                                <a href="ordermaster.php">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
