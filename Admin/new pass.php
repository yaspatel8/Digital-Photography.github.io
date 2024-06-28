<?php

include_once("connection.php");
$PassErr = $npassword =$password= '';
if (isset($_POST["btnsub"])) {
    $npassword = trim($_POST["txtnpassword"]);    
    $password = trim($_POST["txtpassword"]);


    if (strlen($npassword) <= 5) {
        $PassErr = "* At least 6 charactors";
    } elseif (!preg_match("#[0-9]+#", $npassword)) {
        $PassErr = "* At least one Digit";
    } elseif (!preg_match("#[a-z]+#", $npassword)) {
        $PassErr = "* At least one small charactor";
    } elseif (!preg_match("#[A-Z]+#", $npassword)) {
        $PassErr = "* At least one Upper charactor";
    } elseif ($npassword != $cpassword) {
        $CpassErr = "* Password and Confirm Password must be same";
    }
        $data = mysqli_query($con, "update admin_master set password='$npassword' where id=1");

        if ($data) {
            echo "<script> alert('Login Successful..');</script>";
            header("location:login.php");
        } else {
            $PassErr = "* Invalid Email Or Password!";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.spruko.com/azea/azea/vertical/login-1.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 17:01:26 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Azea - Admin Panel HTML template" name="description">
    <meta content="Spruko Private Limited" name="author">
    <meta name="keywords" content="admin, admin dashboard template in php, admin panel bootstrap php theme, admin panel in php, admin panel template, admin template, best php admin panel, bootstrap 5 admin dashboard templates, dashboard, dashboard template, php admin panel, php admin panel template, php, admin template, php dashboard template, php framework">

    <!-- Title -->
    <title>Admin Page</title>

    <!--Favicon -->
    <link rel="icon" href="../Images/logo.jpg" type="image/x-icon" />

    <!--Bootstrap css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/dark.css" rel="stylesheet" />
    <link href="assets/css/skin-modes.css" rel="stylesheet" />

    <!-- Animate css -->
    <link href="assets/css/animated.css" rel="stylesheet" />

    <!---Icons css-->
    <link href="assets/css/icons.css" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" href="assets/colors/color1.css" rel="stylesheet" type="text/css" />
    <style>
        #error {
            color: red;
            font-weight: bold;
            font-size: 3vh;
        }
    </style>

</head>

<body>

    <!-- GLOBAL-LOADER -->
    <!-- <div id="global-loader">
                <img src="https://php.spruko.com/azea/azea/assets/images/svgs/loader.svg" class="loader-img" alt="Loader">
            </div> -->
    <!-- /GLOBAL-LOADER -->

    <div class="register1">
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                                <div class="col-xl-7 col-lg-12">
                                    <div class="row p-0 m-0">
                                        <div class="col-lg-6 p-0">
                                            <div class="text-justified text-white p-5 register-1 overflow-hidden">
                                                <div class="custom-content">
                                                    <div class="mb-5 br-7">
                                                        <center>
                                                            <div class="fs-22 mb-7 pt-3 font-weight-bold text-white">Welcome Admin</div>
                                                        </center>

                                                    </div>
                                                    <div class="ms-1">
                                                        <img src="../Images/logo.jpg" style="height: 30vh; width:80vh; " alt=" logo">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-lg-6 p-0 mx-auto">
                                            <div class="bg-white text-dark br-7 br-tl-0 br-bl-0">
                                                <div class="card-body">
                                                    <div class="text-center mb-3">

                                                        <h1 class="mb-2">New Password</h1>
                                                        <a href="javascript:void(0);" class="">Hello There !</a>
                                                    </div>
                                                    <form class="mt-5" action="" method="post" enctype="multipart/form-data">
                                                        <!-- <form class="mt-5"> -->

                                                        <div class="input-group mb-4">
                                                            <div class="input-group" id="Password-toggle">
                                                                <a href="#" class="input-group-text">
                                                                    <i class="fe fe-eye" aria-hidden="true"></i>
                                                                </a>
                                                                <input class="form-control" type="password" id="password" name="txtnpassword" value="<?php echo $password; ?>" placeholder="New Password" required>

                                                            </div>
                                                            <span id="error"><?php echo $PassErr; ?></span>
                                                        </div>
                                                        <div class="input-group mb-4">
                                                            <div class="input-group" id="Password-toggle">
                                                                <a href="#" class="input-group-text">
                                                                    <i class="fe fe-eye" aria-hidden="true"></i>
                                                                </a>
                                                                <input class="form-control" type="password" id="password" name="txtpassword" value="<?php echo $password; ?>" placeholder="Confirm Password" required>

                                                            </div>
                                                            <span id="error"><?php echo $PassErr; ?></span>
                                                        </div>

                                                        <div class="form-group text-center mb-3">
                                                            <input type="submit" class="btn btn-primary btn-lg w-100 br-7" name="btnsub" value="Log In">
                                                        </div>


                                                    </form>
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
        </div>

    </div>

    <!-- End Page -->
    <!-- Jquery js-->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap5 js-->
    <script src="assets/plugins/bootstrap/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--Othercharts js-->
    <script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>

    <!-- Circle-progress js-->
    <script src="assets/js/circle-progress.min.js"></script>

    <!-- Jquery-rating js-->
    <script src="assets/plugins/rating/jquery.rating-stars.js"></script>

    <!-- Show Password -->
    <script src="assets/js/bootstrap-show-password.min.js"></script>

    <!-- Custom js-->
    <script src="assets/js/custom.js"></script>


</body>

<!-- Mirrored from php.spruko.com/azea/azea/vertical/login-1.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 17:01:26 GMT -->

</html>