<?php
session_start();


$uid = $_SESSION['uid'];
if (!isset($uid))
    echo "<script>window.location.assign('login.php');</script>";
include_once("hhh.php");
include_once("connection.php");

if (isset($_POST["s1"])) {
    $uid = $_SESSION['uid'];
    $total = $_SESSION['total'];
    $odate = date('Y-m-d');
    $name = $_POST['txtname'];
    $address = $_POST['txtaddress'];
    
    $pincode = $_POST['txtpincode'];
    $phone = $_POST['txtphone'];
    $email = $_POST['txtemail'];
    
    $q = mysqli_query($con, "insert into order_master values('',$uid,'$name','$address','$pincode','$phone','$email','$odate',$total,0)");
    if ($q) {
        // $uid = $_SESSION['uid'];
        $_SESSION['name'] = $name;
        // mysqli_query($con,"update addtocart set status=1 where uid=$uid");
        echo "<script>window.location.assign('../product/order/paymentmode.php');</script>";
    } else {
        echo "not inserted..";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="checkout-main-area pt-100 pb-100">
        <div class="container">
            <div class="checkout-wrap pt-30">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap mr-50">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <form method="post">
                                    <?php 
                                        $qry = mysqli_query($con, "select * from user where uid=$uid");
                                        while($row=mysqli_fetch_array($qry)){
                                    ?>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Full Name <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name="txtname" id="name" value="<?php echo $row['fname'] ?> <?php echo $row['lname'] ?>" placeholder="Full Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label> Address <abbr class="required" title="required">*</abbr></label>

                                            <textarea name="txtaddress" id="address"><?php echo $row['address'] ?></textarea>
                                        </div>
                                    </div>
                                    

                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Pincode <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name="txtpincode" id="pin" required placeholder="Pincode">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Phone <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name="txtphone" id="phone" value="<?php echo $row['phone'] ?>" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                            <input type="email" name="txtemail" id="email" value="<?php echo $row['email'] ?>" placeholder="Email" readonly>
                                        </div>
                                    </div>
                                    <div class="Place-order">
                                        <input type="submit" value="Place Order" name="s1">
                                    </div>
                                <?php } ?>
                                </form>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-info-wrap">
                                    <div class="your-order-info">
                                        <ul>
                                            <li>Product <span>Total</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <?php

                                        $q = mysqli_query($con, "select a.*,p.* from addtocart a,product_master p where a.pid=p.pid and a.uid=$uid");
                                        while ($row = mysqli_fetch_array($q)) { ?>
                                            <ul>

                                                <li>
                                                    <?php echo "$row[pname]"; ?> X <?php echo "$row[cartqty]"; ?> <span>&#8377; <?php echo $row['cartqty'] * $row['price'] ?> </span>
                                                </li>


                                            </ul>
                                        <?php } ?>
                                    </div>
                                    <div class="your-order-info order-subtotal">
                                        <ul>
                                            <li>Subtotal <span>&#8377; <?php echo $_SESSION['total']; ?></span></li>
                                        </ul>
                                    </div>

                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Total <span>&#8377; <?php echo $_SESSION['total']; ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
<?php
include_once("fff.php");
?>