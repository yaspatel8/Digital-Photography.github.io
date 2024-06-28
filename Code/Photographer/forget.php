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

        echo "<script>alert('OTP is sent to ur mail..');</script>";
        echo "<script>window.location.assign('forgot_otp_mail.php?email=$to');</script>";
    }
}

?>
<?php

include_once("connection.php");
$email = "";
if (isset($_POST["btnsub"])) {
    $new_otp = rand(999, 9999);
    $email = $_POST['txtemail'];

    $email = trim($email);

    $message = "Alexander Photography!<br/> Your password reset code is " . $new_otp . ".<br/> - Thank you!";
    $qry = mysqli_query($con, "select * from photographer where email='$email'");
    $count = mysqli_num_rows($qry);
    while ($row = mysqli_fetch_array($qry)) {

        if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
            echo "<script>alert('Invalid Email Address');</script>";
        } elseif ($count > 0) {

            mysqli_query($con, "update photographer set otp='$new_otp' where email='$row[email]'");
            echo smtp_mailer($email, 'Password Reset OTP', $message, $new_otp);
            // echo "<script>window.location.assign('forgot_otp_mail.php?email=$row[email]');</script>";
        } else {
            echo "<script>alert('This email address does not exist!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
        h5 {
            font-size: 3vh;
            padding-top: 2vh;
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
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-5 mx-auto">
                        <div class="card-body px-5 py-5">
                            <div class="brand-logo">
                                <img src="../images/logo.jpg" alt="logo">
                            </div>

                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="txtemail" value="<?php echo $email; ?>" required>

                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary btn-block enter-btn" name="btnsub" value="Continue">
                                </div>
                            </form>
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
    <script src="old/assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>