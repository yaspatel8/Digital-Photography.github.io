<?php

include_once('connection.php');


$email = $_GET['email'];
if (isset($_POST['btnsub'])) {
    $q = mysqli_query($con, "select * from user where email='$email'");
    $row = mysqli_fetch_array($q);
    $otp = $row['otp'];
    $otp1 = $_POST['otp'];
    if ($otp == $otp1) {
        mysqli_query($con, "select * from user where email='$email' and otp=$otp");    
        echo "<script>window.location.assign('new_pass.php?email=$email');</script>";
    } else {
        // echo "<script>alert('otp is send to ur mail.. check in ur inbox');</script>";
        echo "<script>alert('Invalid OTP');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                    <label>OTP</label>
                                    <input type="text" class="form-control" id="otp" name="otp" required>
                                 
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