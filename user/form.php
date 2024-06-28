<?php
include("connection.php");

$fname=$lname=$email=$mobno=$pwd=$cpwd=$address=$photo=$dob=$NameMsg = $photoErr=$lNameMsg = $EmailMsg = $phonoMsg = $PassErr = $CpassErr = $addressErr = $dobErr='';

if (isset($_POST["signup"])) {
 
  $fname = trim($_POST["fname"]);
  $lname = trim($_POST["lname"]);
  $email = trim($_POST["email"]);
  $mobno = trim($_POST["mobno"]);
  $pwd = trim($_POST["pwd"]);
  $cpwd = trim($_POST["cpwd"]);
  $address = trim($_POST["address"]);
  $dob = trim($_POST["dob"]);

  $photo = $_FILES["photo"]["name"];
  $dest = "../user/img/" . $photo;


  if (!preg_match("/^[a-zA-z ]{2,10}$/", $fname)) {
    $NameMsg = "* Invalid Name";
  } elseif (!preg_match("/^[a-zA-z ]{2,10}$/", $lname)) {
    $lNameMsg = "* Invalid Name";
  } elseif (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
    $EmailMsg = "* Invalid Email";
  } elseif (strlen($mobno) != 10) {
    $phonoMsg = "* Mobile must have 10 digits.";
  } elseif (!preg_match("#[0-9]+#", $pwd)) {
    $PassErr = "* At least one Digit";
  } elseif (!preg_match("#[a-z]+#", $pwd)) {
    $PassErr = "* At least one small charactor";
  } elseif (!preg_match("#[A-Z]+#", $pwd)) {
    $PassErr = "* At least one Upper charactor";
  } elseif ($pwd != $cpwd) {
    $CpassErr = "* Password and Confirm Password must be same";
  } elseif (strlen($address) <= 10) {
    $addressErr = "* Address at least 10 charactors";
  } elseif ($dob='') {
    $dobErr = "* Please Select the Date";
  } elseif (!$photo) {
    $photoErr = "Profile Photo Is Required";
  } else {
    $data = mysqli_query($con, "select * from user_master");
    while ($row = mysqli_fetch_array($data)) {
      $qry = "insert into user_master values('','$fname','$lname','$email','$address','$mobno','$dob','$photo',0,'$pwd')";
      if ($row['email'] == $email) {
        $EmailMsg = "* User already exist !!!";
      } elseif ($qry) {
        mysqli_query($con, $qry);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $dest);
        echo "<script> alert('Sign Up Successful..');</script>";
      }
    }
  }

  // if (isset($_POST["login"])) {
  //   //Select , Login , Sign In Code
  //   $email = $_POST["eml"];
  //   $pwd = $_POST["pass"];
  //   $tmp = 0;
  //   if (!$email) {
  //     echo "<script>alert('Email Address Is Required');</script>";
  //     $tmp = 2;
  //   } elseif (!$pwd) {
  //     echo "<script>alert('Password Is Required');</script>";
  //     $tmp = 2;
  //   }
  //   $qry = mysqli_query($con, "select * from company_master where email='$email' and pwd='$pwd'");
  //   if ($qry) {
  //     while ($row = mysqli_fetch_array($qry)) {
  //       $tmp = 1;
  //     }
  //     if ($tmp == 1) {
  //       header("location:home.php");
  //     } elseif ($tmp == 0) {
  //       echo "<script>alert('Invalid User')</script>";
  //     }
  //   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in & Sign up Form</title>
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <link rel="stylesheet" href="style1.css">
  <link rel="icon" href="favicon1.svg" type="image/x-icon" />

  <style>
    #error {
      color: red;
      font-weight: bold;
    }

    .column {
      float: left;
      width: 50%;
      /* padding: 10px; */
      /* height: 300px; */
      /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    #custom-button {
      padding: 10px;
      color: white;
      background-color: rgb(19, 19, 43);
      border: none;
      border-radius: 10px;
      cursor: pointer;

    }

    #custom-button:hover {
      background-color: rgb(41, 41, 69);
    }

    #custom-text {
      margin-left: 10px;
      font-family: sans-serif;
      color: #aaa;
    }

    .input-field1 {
      position: absolute;
      width: 90%;
      height: 100%;
      background: none;
      border: none;
      outline: none;
      border-bottom: 1px solid #bbb;
      padding: 0;
      font-size: 0.95rem;
      color: #151111;
      transition: 0.4s;
    }

    /* .input-field1.active {
      border-bottom-color: #151111;
    }

    .input-field1.active+label {
      font-size: 0.75rem;
      top: -2px;
    } */
  </style>
</head>

<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form method="post" enctype="multipart/form-data" id="form1" class="sign-in-form">
            <!-- <div class="logo">
              <img src="./img/logo.png" alt="easyclass" />
              <h4>easyclass</h4>
            </div> -->
            <br>
            <br>
            <br>

            <div class="heading">
              <h2>Welcome Back</h2>
              <h6>Not registred yet?</h6>
              <a href="#" class="toggle">Sign up</a>
            </div>
            <br>
            <div class="actual-form">
              <div class="input-wrap">
                Email:
                <br>
                <input type="text" id="eml" name="eml" class="input-field" autocomplete="on" required />
              </div>

              <div class="input-wrap">
                Password:
                <br>
                <input type="password" id="pass" name="pass" class="input-field" autocomplete="on" required />
              </div>
              <br>
              <input type="submit" value="Sign In" class="sign-btn" id="login" name="login" />

              <!-- <p class="text">
                Forgotten your password or you login datails?
                <a href="#">Get help</a> signing in
              </p> -->
            </div>
          </form>

          <form method="post" id="form2" enctype="multipart/form-data" class="sign-up-form">
            <!-- <div class="logo">
              <img src="./img/logo.png" alt="easyclass" />
              <h4>easyclass</h4>
            </div> -->
            <br>
            <div class="heading">
              <h2>Get Started</h2>
              <h6>Already have an account?</h6>
              <a href="#" class="toggle">Sign in</a>
            </div>
            <br>
            <div class="actual-form">

              <div class="row">
                <div class="column">
                  <div class="input-wrap">
                    First Name:
                    <br>
                    <input type="text" id="fname" name="fname" class="input-field1" autocomplete="on" value="<?php echo $fname; ?>" required />
                  </div>
                  <span id="error"><?php echo $NameMsg; ?></span>
                </div>

                <div class="column">
                  <div class="input-wrap">
                    Last Name:
                    <br>
                    <input type="text" id="lname" name="lname" class="input-field" autocomplete="on" value="<?php echo $lname; ?>" required />
                  </div>
                  <span id="error"><?php echo $lNameMsg; ?></span>
                </div>
              </div>

              <div class="row">
                <div class="column">
                  <div class="input-wrap">
                    Email:
                    <br>
                    <input type="emial" id="email" name="email" class="input-field1" autocomplete="on" value="<?php echo $email; ?>" required />
                  </div>
                  <span id="error"><?php echo $EmailMsg; ?></span>
                </div>

                <div class="column">
                  <div class="input-wrap">
                    Mobile No.:
                    <br>
                    <input type="text" id="mobno" name="mobno" class="input-field" autocomplete="on" value="<?php echo $mobno; ?>" required />
                  </div>
                  <span id="error"><?php echo $phonoMsg; ?></span>
                </div>
              </div>

              <div class="row">
                <div class="column">
                  <div class="input-wrap">
                    Password:
                    <br>
                    <input type="text" id="pwd" name="pwd" class="input-field1" autocomplete="on" value="<?php echo $pwd; ?>" required />
                  </div>
                  <span id="error"><?php echo $PassErr; ?></span>
                </div>

                <div class="column">
                  <div class="input-wrap">
                    Confrim Password:
                    <br>
                    <input type="text" id="cpwd" name="cpwd" class="input-field1" autocomplete="on" value="<?php echo $cpwd; ?>" required />
                  </div>
                  <span id="error"><?php echo $CpassErr; ?></span>
                </div>
              </div>

              <div class="input-wrap">
                Address:
                <br>
                <input type="text" id="address" name="address" class="input-field" autocomplete="on" value="<?php echo $address; ?>" required />
              </div>
              <span id="error"><?php echo $addressErr; ?></span>


              <div class="input-wrap">
                Date Of Birth
                <br>
                <input type="date" id="dob" name="dob" class="input-field" autocomplete="on"  value="<?php echo $dob; ?>"required />
              </div>
              <span id="error"><?php echo $dobErr; ?></span>
    
              <div class="input-wrap">
                Profile Image:
                <br>
                
                <input type="file" id="photo" name="photo" hidden="hidden"  />
                <button type="button" id="custom-button" >CHOOSE A FILE</button>
                <span id="custom-text">No file chosen, yet.</span>
              </div>
              <span id="error"><?php echo $photoErr; ?></span>

              <br>
              <input type="submit" value="Sign Up" class="sign-btn" id="signup" name="signup" />

              <!-- <p class="text">
                By signing up, I agree to the
                <a href="#">Terms of Services</a> and
                <a href="#">Privacy Policy</a>
              </p> -->
            </div>
          </form>
        </div>

        <div class="carousel">
          <div class="images-wrapper">
            <img src="./img/logo.jpg" class="image img-1 show" alt="" />
            <!-- <img src="./img/image2.png" class="image img-2" alt="" />
            <img src="./img/image3.png" class="image img-3" alt="" /> -->
          </div>

          <!-- <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>Create your own courses</h2>
                <h2>Customize as you like</h2>
                <h2>Invite students to your class</h2>
              </div>
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </main>

  <!-- Javascript file -->

  <script src="app.js"></script>

  <script>
    const realFileBtn = document.getElementById("photo");
    const customBtn = document.getElementById("custom-button");
    const customTxt = document.getElementById("custom-text");

    customBtn.addEventListener("click", function() {
      realFileBtn.click();
    });

    realFileBtn.addEventListener("change", function() {
      if (realFileBtn.value) {
        customTxt.innerHTML = realFileBtn.value.match(
          /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
      } else {
        customTxt.innerHTML = "No file chosen, yet.";
      }
    });
  </script>


</body>

</html>