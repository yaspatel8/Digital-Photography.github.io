<?php
session_start();

$uid = $_SESSION['uid'];

if (!isset($uid))
    echo "<script>window.location.assign('login.php');</script>";
$fname = $fNameMsg = $lname = $lNameMsg = $dateErr = $EmailMsg = $email = $phono = $phonoMsg = $address = $addressErr = $password = $PassErr = $cpassword = $CpassErr = '';
include_once("hhh.php");
include_once("connection.php");
$qry1 = mysqli_query($con, "select * from user where uid=$uid");

while ($row1 = mysqli_fetch_array($qry1)) {


    if (isset($_POST["btnsub"])) {
        if ($_FILES['pic']['name'] != "") {
            $photo = $_FILES['pic']['name'];
            $dest = "../user_image/" . $photo;
            move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        } else {
            $photo = $_POST['oldimage'];
        }
        if ($_POST['txtpass'] != "") {
            // if (!strlen($password) <= 5) {
            //     $PassErr = "* At least 6 charactors";
            // } elseif (!preg_match("#[0-9]+#", $password)) {
            //     $PassErr = "* At least one Digit";
            // } elseif (!preg_match("#[a-z]+#", $password)) {
            //     $PassErr = "* At least one small charactor";
            // } elseif (!preg_match("#[A-Z]+#", $password)) {
            //     $PassErr = "* At least one Upper charactor";
            // } elseif ($password != $cpassword) {
            //     $CpassErr = "* Password and Confirm Password must be same";
            // }
            $password = trim($_POST["txtpass"]);
        } else {
            $password = $_POST['old'];
        }



        $fname = trim($_POST["txtfname"]);
        $lname = trim($_POST["txtlname"]);
        $email = trim($_POST["txtemail"]);
        $phono = trim($_POST["txtphone"]);
        $address = trim($_POST["txtadd"]);
        // $password = trim($_POST["txtpass"]);
        // $cpassword = trim($_POST["txtconfirm"]);
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
        } elseif (strlen($address) <= 10) {
            $addressErr = "* Address at least 10 charactors";
            // } elseif (!strlen($password) <= 5) {
            //     $PassErr = "* At least 6 charactors";
            // } elseif (!preg_match("#[0-9]+#", $password)) {
            //     $PassErr = "* At least one Digit";
            // } elseif (!preg_match("#[a-z]+#", $password)) {
            //     $PassErr = "* At least one small charactor";
            // } elseif (!preg_match("#[A-Z]+#", $password)) {
            //     $PassErr = "* At least one Upper charactor";

        } else {
            $qry = mysqli_query($con, "update user set fname='$fname',lname='$lname',email='$email',photo='$photo',phone='$phono',address='$address',password='$password' where uid=$uid");
            if ($qry) {
                $uid = $_SESSION['uid'];
                // move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
                echo "<script> alert('Update Successful..');</script>";
                echo "<script>window.location.assign('profile.php')</script>";
            } else {

                echo "<script> alert(' Not Update Data..');</script>";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            #error {
                color: red;
            }

            label {
                font-size: medium;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <div class="main-wrapper wrapper-2">

            <!-- mini cart start -->

            <div class="login-register-area pt-10">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <h2> Profile </h>
                                </div>
                                <div class="login-form-container">

                                    <div class="login-register-form">
                                        <form method="post" enctype="multipart/form-data">
                                            <center>
                                                <img src="../user_image/<?php echo "$row1[photo]"; ?>" alt="" height="120vh" width="120vh">
                                                <input type="hidden" name="oldimage" value="<?php echo $row1['photo']; ?>">
                                            </center>
                                            <label class="image">New Image</label>

                                            <input type="file" name="pic" id="image" value="<?php echo $row1['photo']; ?>"><br>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">First Name</label>
                                                        <input type="text" class="form-control" name="txtfname" placeholder="Your First Name" value="<?php echo "$row1[fname]"; ?>" required>
                                                        <span id="error"><?php echo $fNameMsg; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">Last Name</label>
                                                        <input type="text" class="form-control" name="txtlname" placeholder="Your Last Name" value="<?php echo "$row1[lname]"; ?>" required>
                                                        <span id="error"><?php echo $lNameMsg; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" class="form-control" name="txtemail" placeholder="Your Email" value="<?php echo "$row1[email]"; ?>" readonly required>
                                                        <span id="error"><?php echo $EmailMsg; ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">Mobile Number</label>
                                                        <input type="text" class="form-control" name="txtphone" placeholder="Your Mobile Number" value="<?php echo "$row1[phone]"; ?>" required>
                                                        <span id="error"><?php echo $phonoMsg; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Address</label>
                                                        <textarea name="txtadd" class="form-control" placeholder="Your Address" rows="5" required><?php echo "$row1[address]"; ?></textarea>
                                                        <span id="error"><?php echo $addressErr; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">Old Password</label>

                                                        <input type="text" class="form-control" name="old" placeholder="old Password" value="<?php echo "$row1[password]"; ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">New Password</label>
                                                        <input type="text" class="form-control" name="txtpass" placeholder="New Password">

                                                        <span id="error"><?php echo $PassErr; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">Confirm Password</label>
                                                        <input type="text" class="form-control" name="txtconfirm" placeholder="Confirm Password">
                                                        <span id="error"><?php echo $CpassErr; ?></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="button-box">

                                                <button type="submit" name="btnsub">Update Profile</button>
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
    <?php } ?>
    </body>

    </html>