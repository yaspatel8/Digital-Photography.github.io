<?php 
include_once('connection.php');
$PassErr=$CpassErr="";
$email = $_GET['email'];
$q = mysqli_query($con, "select * from user where email='$email'");
$r = mysqli_fetch_array($q);


if (isset($_POST["btnsub"])) {
    $password = $_POST["new"];
    $cpassword = $_POST["cnew"];

    $password = trim($password);
    $cpassword = trim($cpassword);

    
    if (strlen($password) <= 5) {
        $PassErr = "* At least 6 charactors";
    } elseif (!preg_match("#[0-9]+#", $password)) {
        $PassErr = "* At least one Digit";
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $PassErr = "* At least one small charactor";
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $PassErr = "* At least one Upper charactor";
    } elseif ($password != $cpassword) {
        $CpassErr = "* Password and Confirm Password must be same";
    }
    else {
        mysqli_query($con, "update user set password='$password' where email='$email'");
        echo "<script>alert('Password Updated..');</script>";
        echo "<script>window.location.assign('login.php');</script>";
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
                                    <label>New Passowrd</label>
                                    <input type="password" class="form-control" id="new" name="new" required>
                                    <span id="error"><?php echo $PassErr; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Passowrd</label>
                                    <input type="password" class="form-control" id="cnew" name="cnew" required>
                                    <span id="error"><?php echo $CpassErr; ?></span>
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
</html>