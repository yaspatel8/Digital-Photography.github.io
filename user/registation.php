<?php
include_once("connection.php");
// session_start();
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

        echo "<script>alert('OTP is sent to ur mail..');</script>";
        echo "<script>window.location.assign('otp.php?email=$to');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themewagon.github.io/corona-free-dark-bootstrap-admin-template/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jan 2024 08:14:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="old/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="old/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="old/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="icon" href="../Images/logo.jpg">
    <style>
        #suggest {
            padding-top: 1.1vh;
            font-size: 2.6vh;
            font-weight: 100;
            color: #bac4d2;

        }

        input[type=submit] {
            height: 8vh;
        }

        #error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $fname = $fNameMsg = $lname = $lNameMsg = $dateErr = $EmailMsg = $email = $phono = $phonoMsg = $address = $addressErr = $AadhaarErr = $idno = $idproof = $password = $PassErr = $cpassword = $CpassErr = '';
    include_once("connection.php");
    if (isset($_POST["btnsub"])) {



        $fname = trim($_POST["txtfname"]);
        $lname = trim($_POST["txtlname"]);
        $email = trim($_POST["txtemail"]);
        $phono = trim($_POST["txtphone"]);


        $date = trim($_POST["txtdob"]);
        $today = date("Y-m-d");
        $diff = date_diff(date_create($date), date_create($today));
        $age = $diff->format('%Y');
        $gender = trim($_POST["idp"]);
        $address = trim($_POST["txtadd"]);
        $password = trim($_POST["txtpass"]);
        $cpassword = trim($_POST["txtconfirm"]);
        // $message="Welcome! Please enter the One-Time Password (OTP) you've received to proceed.<br> Thank you!";
        //$otp = rand(999, 9999);

        $photo = $_FILES["pic"]["name"];
        $dest = "../user_image/" . $photo;
        $otp = rand(999, 9999);
        $message = "Welcome to Alexander Photography!<br/> Please enter the One-Time Password (OTP) you've received to proceed. <br/>Your OTP is " . $otp . ".<br/> - Thank you!";
        if (!preg_match("/^[a-zA-z ]{2,30}$/", $fname)) {
            $fNameMsg = "* Invalid Name";
        } elseif (!preg_match("/^[a-zA-z ]{2,30}$/", $lname)) {
            $lNameMsg = "* Invalid Name";
        } elseif (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
            $EmailMsg = "* Invalid Email";
        } elseif (!preg_match("/^[0-9]*$/", $phono)) {
            $phonoMsg = "* Only numeric value is allowed.";
        } elseif (strlen($phono) != 10) {
            $phonoMsg = "* Mobile must have 10 digits.";
        } elseif ($age < 18) {
            $dateErr = "*You must be 18 Years or older to process.";
        } elseif (strlen($address) <= 10) {
            $addressErr = "* Address at least 10 charactors";
        } elseif (strlen($password) <= 5) {
            $PassErr = "* At least 6 charactors";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $PassErr = "* At least one Digit";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $PassErr = "* At least one small charactor";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $PassErr = "* At least one Upper charactor";
        } elseif ($password != $cpassword) {
            $CpassErr = "* Password and Confirm Password must be same";
        } else {
            $data = mysqli_query($con, "select * from user where email='$email'");
            $count = mysqli_num_rows($data);
            if ($count > 0) {
                $EmailMsg = "* Email-id is already exist !!!";
            } else {
                $q = mysqli_query($con, "insert into user values('','$fname','$lname','$email','$address','$gender','$phono','$date','$photo',0,'$password',$otp)");
                // mysqli_query($con, $q);
                move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
                echo "<script>alert('Sign Up Successfull..');</script>";
                echo smtp_mailer($email, 'OTP Verification', $message, $otp);
            }
        }
    }
    ?>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-5 mx-auto">
                        <div class="card-body px-5 py-5">

                            <div class="brand-logo">
                                <img src="../Images/logo.jpg" alt="logo">
                                <h5><br>New User?</h5>
                            </div>


                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" id="fname" name="txtfname" value="<?php echo $fname; ?>" required>
                                    <span id="error"><?php echo $fNameMsg; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="txtlname" value="<?php echo $lname; ?>" required>
                                    <span id="error"><?php echo $lNameMsg; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="txtemail" value="<?php echo $email; ?>" required>
                                    <span id="error"><?php echo $EmailMsg; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="phone" name="txtphone" value="<?php echo $phono; ?>" required>
                                    <span id="error"><?php echo $phonoMsg; ?></span>
                                </div>

                                <div class="form-group">
                                    <label class="image">Upload Image</label>
                                    <input type="file" name="pic" accept=".jpg,.png,.webp,.jpeg" id="image" required class="form-control">
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Gender</label>
                                    <div class="col-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="idp" id="Male" value="Male" checked required> Male </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="idp" id="Female" value="Female" required> Female </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Date Of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="txtdob"  value="<?php echo $date; ?>" required> <br>
                                    <span id="error"><?php echo $dateErr; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Address</label>
                                    <textarea class="form-control" id="address" rows="4" name="txtadd" required> <?php echo $address; ?> </textarea><br>
                                    <span id="error"><?php echo $addressErr; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="txtpass" value="<?php echo $password; ?>" required>
                                    <span id="error"><?php echo $PassErr; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm" name="txtconfirm" value="<?php echo $cpassword; ?>" required>
                                    <span id="error"><?php echo $CpassErr; ?></span>
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" required> I agree to all Terms & Conditions </label>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary btn-block enter-btn" name="btnsub" value="Sign Up">
                                </div>

                                <p class="sign-up text-center">Already have an Account?<a href="login.php"> Sign Up</a></p>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    </div>
    <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="old/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="old/assets/js/off-canvas.js"></script>
    <script src="old/assets/js/hoverable-collapse.js"></script>
    <script src="old/assets/js/misc.js"></script>
    <script src="old/assets/js/settings.js"></script>
    <script src="old/js/todolist.js"></script>
    <!-- endinject -->
</body>

<!-- Mirrored from themewagon.github.io/corona-free-dark-bootstrap-admin-template/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jan 2024 08:14:45 GMT -->

</html>