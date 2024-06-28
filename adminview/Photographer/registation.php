<?php

include("connection.php");
$name = $NameMsg = $EmailMsg = $email = $phono = $phonoMsg = $address = $addressErr = $AadhaarErr = $idno = $idproof = $password = $PassErr = $cpassword = $CpassErr = '';
if (isset($_POST["btnsub"])) {
    $name = trim($_POST["txtname"]);
    $email = trim($_POST["txtemail"]);
    $phono = trim($_POST["txtphone"]);

    $photo = $_FILES["pic"]["name"];
    $dest = "../Photographer/Images/" . $photo;

    $photo1 = $_FILES["pic1"]["name"];
    $dest1 = "../Photographer/Images/" . $photo1;

    $idproof = trim($_POST["idp"]);
    $idno = trim($_POST["txtidno"]);
    $address = trim($_POST["txtadd"]);
    $password = trim($_POST["txtpass"]);
    $cpassword = trim($_POST["txtconfirm"]);
    

    if (!preg_match("/^[a-zA-z ]{2,30}$/", $name)) {
        $NameMsg = "* Invalid Name";
    } elseif (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
        $EmailMsg = "* Invalid Email";
    } elseif (!preg_match("/^[0-9]*$/", $phono)) {
        $phonoMsg = "* Only numeric value is allowed.";
    } elseif (strlen($phono) != 10) {
        $phonoMsg = "* Mobile must have 10 digits.";
    } elseif ($idproof == "PAN Card" && !preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]$/", $idno)) {
        $AadhaarErr = "* PAN Card Number is invalid";
    } elseif ($idproof == "Aadhaar Card" && !preg_match("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$^", $idno)) {
        $AadhaarErr = "* Aadhaar Card Number is invalid";
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
        $data = mysqli_query($con, "select * from photographer");
        while ($row = mysqli_fetch_array($data)) {
            $qry = "insert into photographer values('','$name','$email','$address','$phono','$photo1','$idproof','$idno','$password','$photo',now(),0)";
            if ($row['email'] == $email) {
                $EmailMsg = "* User already exist !!!";
            } elseif ($qry) {
                mysqli_query($con, $qry);
                move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
                move_uploaded_file($_FILES['pic1']['tmp_name'], $dest1);
                echo "<script> alert('Register Successful..');</script>";
                header("location:login.php");
            }
        }
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
    <title>Photographer Register</title>
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
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-5 mx-auto">
                        <div class="card-body px-5 py-5">

                            <div class="brand-logo">
                                <img src="../Images/logo.jpg" alt="logo">
                                <h5><br>New Photographer?</h5>
                            </div>


                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="txtname" value="<?php echo $name; ?>" required>
                                    <span id="error"><?php echo $NameMsg; ?></span>
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
                                    <input type="file" name="pic" id="image" required class="form-control">
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Choose Id Proof</label>
                                    <div class="col-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="idp" id="Aadhaar Card" value="Aadhaar Card" <?php echo $idproof == "Aadhaar Card" ? "checked" : ""; ?> required> Aadhaar Card </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="idp" id="PAN Card" value="PAN Card" <?php echo $idproof == "PAN Card" ? "checked" : ""; ?> required> PAN Card </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="image">Id Proof</label>
                                    <input type="file" name="pic1" id="idpr" required class="form-control">
                                    <span class="menu-icon">
                                        <i class="mdi mdi-information" style="color:green"></i>

                                        <label id="suggest">Upload either Aadhaar Card or PAN Card </label>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Id Number</label>
                                    <input type="text" class="form-control" id="idn" name="txtidno" value="<?php echo $idno; ?>" required>
                                    <span id="error"><?php echo $AadhaarErr; ?></span>
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
                                    <input type="submit" class="btn btn-primary btn-block enter-btn" name="btnsub" value="Login">
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
    <script src="old//js/todolist.js"></script>
    <!-- endinject -->
</body>

<!-- Mirrored from themewagon.github.io/corona-free-dark-bootstrap-admin-template/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jan 2024 08:14:45 GMT -->

</html>