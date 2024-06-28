<?php
include("connection.php");
$ErrMsg = $email = $PassErr = $password = '';
if (isset($_POST["btnsub"])) {
    $email = trim($_POST["txtemail"]);
    $password = trim($_POST["txtpassword"]);

    if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
        $ErrMsg = "* Invalid Email";
    } elseif (strlen($password) <= 5) {
        $PassErr = "* At least 6 charactors";
    } elseif (!preg_match("#[0-9]+#", $password)) {
        $PassErr = "* At least one Digit";
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $PassErr = "* At least one small charactor";
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $PassErr = "* At least one Upper charactor";
    } else {
        $data = mysqli_query($con, "select * from photographer");
        while ($row = mysqli_fetch_array($data))
        {
            if ($row['email'] == $email && $row['password'] == $password && $row['status'] == 1) {
                echo "<script> alert('Login Successful..');</script>";
                header("location:ahome.php");
            } elseif ($row['email'] == $email && $row['password'] == $password && $row['status'] == 0) {
                $PassErr = "You are a not accept In Photographer!";
            } else {
                $PassErr = "Invalid Email Or Password!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themewagon.github.io/corona-free-dark-bootstrap-admin-template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jan 2024 08:14:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
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
                                <h5>Hello! let's get started</h5>
                            </div>

                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="txtemail" value="<?php echo $email; ?>" required>
                                    <span id="error"><?php echo $ErrMsg; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="txtpassword" value="<?php echo $password; ?>" required>
                                    <span id="error"><?php echo $PassErr; ?></span>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" required>Keep me sign in</label>
                                    </div>
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary btn-block enter-btn" name="btnsub" value="Login">
                                </div>

                                <p class="sign-up">Don't have an Account?<a href="register.php"> Sign Up</a></p>
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

<!-- Mirrored from themewagon.github.io/corona-free-dark-bootstrap-admin-template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jan 2024 08:14:45 GMT -->

</html>