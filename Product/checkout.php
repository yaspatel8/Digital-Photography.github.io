<?php
session_start();
include('hhh.php');
include('connection.php');
?>
<?php
  
  if (isset($_POST["s1"])) {
    $uid=$_SESSION['uid'];
    $total=$_SESSION['total'];
    $odate=date('Y-m-d');
    $name = $_POST['txtname'];
    $address = $_POST['txtaddress'];
    $city = $_POST['txtcity'];
    $pincode = $_POST['txtpincode'];
    $phone = $_POST['txtphone'];
    $email = $_POST['txtemail'];
    $q = mysqli_query($con, "insert into order_master values('',$uid,'$name','$address','$city','$pincode','$phone','$email','$odate',$total,0)");
    if ($q) {
        $_SESSION['name']=$name;
    
      echo "<script>window.location.assign('../user/order/paymentmode.php');</script>";
    }
      else{
        echo "not inserted..";
    }

  }
  ?>
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="index.html">Home</a>
                            <a href="shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form  method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="txtname">
                            </div>
                           
                            
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="txtaddress" placeholder="Street Address" class="checkout_input_add">
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="txtcity">
                            </div>
                            <div class="checkout__input">
                                <p><span></span></p>
                                
                            </div>
                            <div class="checkout__input">
                                <p>Pincode / ZIP<span>*</span></p>
                                <input type="text" name="txtpincode">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="txtphone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="txtemail">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout_input_checkbox">
                                <label for="acc">
                                
                                
                                    <span class="checkmark"></span>
                                </label>
                                <p></p>
                            </div>
                            <div class="checkout__input">
                                <p><span></span></p>
                                                          </div>
                            <div class="checkout_input_checkbox">
                                <label for="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                               </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout_order_products">Product <span>Total</span></div>
                                <ul class="checkout_total_products">
                                    <?php
                                   $q=mysqli_query($con,"select a.*,p.*,u.* from addtocart a,product_master p,user u where a.uid=u.uid and a.pid=p.pid");
                                   while($row=mysqli_fetch_array($q))
                                   {
                                   echo "<li>".$row['pname']."<span>(".$row['cartqty'].")".$row['price']."</span></li>";
                                   }
                                   ?>
                                </ul>
                                <ul class="checkout_total_all">
                                    <li>Subtotal <span><?php echo $_SESSION['total']."Rs";?></span></li>
                                    <li>Shipping Cost <span>100 Rs</span></li>
                                    <li>Total <span><?php echo $_SESSION['t']."Rs";?></span></li>
                                </ul>
                                <div class="checkout_input_checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                                <div class="checkout_input_checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout_input_checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn" name="s1">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
