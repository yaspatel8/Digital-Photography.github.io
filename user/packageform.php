<?php
include('smtp/PHPMailerAutoload.php');
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "p6644354@gmail.com";
    $mail->Password = "kbmn mkvh yjtx wfsn";
    $mail->SetFrom("email");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {

        echo "<script>alert('Your Package Booked..');</script>";
        echo "<script>window.location.assign('vieworder.php');</script>";
    }
}

?>

<?php

session_start();

$uid = $_SESSION['uid'];
if (!isset($uid))
    echo "<script>window.location.assign('login.php');</script>";
include_once("hhh.php");
include_once("connection.php");
$cid = $_GET['cid'];
$sid = $_GET['sid'];
$subcategories = mysqli_query($con, "select * from packagecategory_master where cid=$cid");
($row1 = mysqli_fetch_array($subcategories));
$cname = $row1['cname'];

$categories = mysqli_query($con, "select * from packagesub_category where sid=$sid");
while ($row2 = mysqli_fetch_array($categories)) {
    $sname = $row2['sname'];
    // $price = $row2['price'];
}
$qry = mysqli_query($con, "select * from photographer where status=1");
while ($row = mysqli_fetch_array($qry)) {
    $name = $row['name'];
}
$datetErr = $datetErr2 = "";
if (isset($_POST["btnsub"])) {
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $email = trim($_POST["temail"]);
    $mobile = trim($_POST["mobile"]);
    $address = trim($_POST["address"]);

    $datet = trim($_POST["datet"]);
    $cdate = new DateTime();
    $input = new DateTime($datet);

    $datef = trim($_POST["datef"]);
    $datef1 = new DateTime($datef);
    $diff = $input->diff($datef1);
    $day = $diff->days;


    $photo = trim($_POST["photographer"]);
    $amount = trim($_POST["amount"]);
    $order_id = rand(999999, 9999999);

    $message = "Hello! <b>" . $fname . " " . $lname . ".</b> Your Email is " . $email . ".<br/> 
Your Package Booked.<br/>
Package Details - <br/>
Package Name : " . $cname . "<br/>
Sub Package Name : " . $sname . "<br/>
Price : " . $amount . "<br/>
Photographer Name : " . $name . "<br/> 
Order Id : " . $order_id . "<br/>

Please allow 2-3 days for order to be Approved.<br/>
- Thank you For Booking.<br/><br/>
By Alexander Photography..!";

    
    if ($input <= $cdate) {
        $datetErr = "*Select The future date";
    } elseif ($day >= 30) {
        $datetErr2 = "* The date Book in 30 days";
    } else {
            $insertq = mysqli_query($con, "insert into booking_master values('','$uid','$sid','$photo','$fname','$lname','$email','$mobile','$address','$amount','$datet','$datef',0,$order_id)");
            // echo "<script> alert('Pacakgae Booked..');</script>";
            echo smtp_mailer($email, "Package Booked", $message);
        } 
    }


?>

<head>
    <style>
        #error {
            color: red;
        }
    </style>
</head>
<!-- Column -->
<div class="col-lg-12 ">

    <!-- Begin split box content -->
    <div class="split-box-content">

        <!-- Begin contact form 
											========================= -->
        <form method="post">
            <div class="contact-form-inner text-left">

                <div class="contact-form-info">

                    <!-- Begin tt-heading 
														====================== 
														* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
														* Use class "text-center" or "text-right" to align tt-heading.
														* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
														-->
                    <div class="tt-heading">
                        <div class="tt-heading-inner">
                            <h1 class="tt-heading-title">Book Package</h1>
                            <!-- <div class="tt-heading-subtitle">Subtitle Here</div> -->
                            <hr class="hr-short">
                        </div> <!-- /.tt-heading-inner -->
                    </div>
                    <!-- End tt-heading -->
                </div>

                <!-- Begin hidden required fields (https://github.com/agragregra/uniMail) -->
                <!-- End Hidden Required Fields -->

                <?php

                $qry = mysqli_query($con, "select * from user where uid=$uid");
                while ($row = mysqli_fetch_array($qry)) {

                ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="Your First Name" value="<?php echo $row['fname']; ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Your Last Name" value="<?php echo $row['lname']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="temail" placeholder="Your Email" value="<?php echo $row['email']; ?>" readonly required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" placeholder="Your Mobile Number" value="<?php echo $row['phone']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" placeholder="Your Address" rows="5" required><?php echo $row['address']; ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="col-lg-6">
                        <?php
                        $subcategories = mysqli_query($con, "select * from packagecategory_master where cid=$cid");
                        ($row1 = mysqli_fetch_array($subcategories))
                        ?>
                        <div class="form-group">
                            <label for="">Package Name</label>
                            <input type="text" class="form-control" name="pack" placeholder="Your Package Name" value="<?php echo $row1['cname']; ?>" readonly required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php
                        $categories = mysqli_query($con, "select * from packagesub_category where sid=$sid");
                        while ($row2 = mysqli_fetch_array($categories)) {
                        ?>
                            <div class="form-group">
                                <label for="">Sub Package Name</label>
                                <input type="text" class="form-control" name="subpack" placeholder="Your Package Name" value="<?php echo $row2['sname']; ?>" readonly required>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Date To</label>
                            <input type="date" class="form-control" name="datet" value="<?php echo $datet; ?>" required>
                            <span id="error"><?php echo $datetErr; ?></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Date From</label>
                            <input type="date" class="form-control" name="datef" value="<?php echo $datef; ?>" required>
                            <span id="error"><?php echo $datetErr2; ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="">Select Photographer</label>
                            <select class="form-control" name="photographer" required>
                                <option value="" disabled selected>Select an option</option>
                                <?php
                                $qry = mysqli_query($con, "select * from photographer where status=1");
                                while ($row = mysqli_fetch_array($qry)) {

                                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <?php
                        $categories = mysqli_query($con, "select * from packagesub_category where sid=$sid");
                        while ($row2 = mysqli_fetch_array($categories)) {
                        ?>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" name="amount" placeholder="Amount" value="<?php echo $row2['price']; ?>" readonly required>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <div class="small text-gray"><em>* All fields are required!</em></div>

            </div> <!-- /.contact-form-inner -->

            <div class="row">
                <div class="col-lg-12">

                    <input type="submit" name="btnsub" class="btn btn-primary btn-lg margin-top-40" value="Book Package">
                </div>
            </div>
        </form>
        <!-- End contact form -->

    </div>
    <!-- End split box content -->

</div> <!-- /.col -->



<div class="row">


    <!-- Begin custom Google Map 
									=============================
									* Tutorial: https://developers.google.com/maps/documentation/javascript/tutorial
									* Styles: https://snazzymaps.com/
									-->

    <!-- End custom Google Map -->


</div> <!-- /.row -->


<!-- End contact section -->


<!-- ===========================
			///// Begin footer section /////
			================================
			* Use class "footer-dark" to enable dark footer.
			* Use class "no-margin-top" if needed. 
			-->
<?php
include_once("fff.php");
?>
</body>


<!-- Mirrored from demo.themetorium.net/html/sepia/contact-fluid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Feb 2024 06:59:07 GMT -->

</html>