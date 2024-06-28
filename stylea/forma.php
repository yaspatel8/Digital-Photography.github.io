 <?php
include("connection.php");
if (isset($_POST["signup"])) {
  // Insert , Registration , Sign Up Code
  $name = $_POST["name"];
  $mobno = $_POST["mobno"];
  $email = $_POST["email"];
  $photo = $_FILES["photo"]["name"];
  $pwd = $_POST["pwd"];
  $cpwd = $_POST["cpwd"];
  $dest = "./photo/" . $photo;
  $name = trim($name);
  $mobno = trim($mobno);
  $email = trim($email);
  $pwd = trim($pwd);
  $cpwd = trim($cpwd);
  if (!$name) {
    echo "<script>alert('Farmer Name Is Required');</script>";
  } elseif (!$email) {
    echo "<script>alert('Email Address Is Required');</script>";
  } elseif (!$photo) {
    echo "<script>alert('Farmer Photo Is Required');</script>";
  } elseif (!$pwd) {
    echo "<script>alert('Password Is Required');</script>";
  } elseif (!$cpwd) {
    echo "<script>alert('Confirm Password Is Required');</script>";
  } elseif (!$mobno) {
    echo "<script>alert('Mobile Number Is Required');</script>";
  } elseif (!$photo) {
    echo "<script>alert('Farmer Photo Is Required');</script>";
  } elseif (!preg_match('/^[a-zA-Z]*$/', $name)) {
    echo "<script>alert('Invalid Farmer Name');</script>";
  } elseif (strlen($mobno) != 10) {
    echo "<script>alert('Mobile Number Must Be 10 Digit');</script>";
  } elseif (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
    echo "<script>alert('Invalid Email Address');</script>";
  } elseif (strlen($pwd) != 6) {
    echo "<script>alert('Password Must Be 6 Alphanumeric Character');</script>";
  } elseif ($pwd != $cpwd) {
    echo "<script>alert('Password And Confirm Password Must Be Same');</script>";
  } else {
    $qry = "insert into user_master values('','$name','patel','$email','surat','$mobno','now()',,'$photo',0,'$pwd')";
    if ($qry) {
      mysqli_query($con, $qry);
      move_uploaded_file($_FILES["photo"]["tmp_name"], $dest);
      echo "<script>alert('Successfully Sign Up')</script>";
    }
  }
}
if (isset($_POST["login"])) {
  //Select , Login , Sign In Code
  $email = $_POST["eml"];
  $pwd = $_POST["pass"];
  $tmp = 0;
  if (!$email) {
    echo "<script>alert('Email Address Is Required');</script>";
    $tmp = 2;
  } elseif (!$pwd) {
    echo "<script>alert('Password Is Required');</script>";
    $tmp = 2;
  }
  $qry = mysqli_query($con, "select * from admin_master where email='$email' and password='$pwd'");
  if ($qry) {
    while ($row = mysqli_fetch_array($qry)) {
      $tmp = 1;
    }
    if ($tmp == 1) {
      header("location:home.php");
    } elseif ($tmp == 0) {
      echo "<script>alert('Invalid User')</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylea.css" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.svg" />

  <style>
    /* #file-input {
      display: none;
    }

    #file-input-label {
      background: none;
      outline: none;
      border: none;
      line-height: 1;
      color: #aaa;
      font-weight: 500;
      font-size: 1.1em;
      padding-top: 19px;
    } */


    .input-field1 {
      max-width: 380px;
      width: 100%;
      color: #aaa;
      background-color: #f0f0f0;
      margin: 10px 0;
      height: 55px;
      border-radius: 55px;
      display: inline-block;
      padding-left: 25px;
      grid-template-columns: 15% 85%;
      /* padding: 0 0.4rem; */
      position: relative;
    }

    .input-field1 i {
      text-align: center;
      line-height: 55px;
      color: #acacac;
      transition: 0.5s;
      font-size: 1.1rem;
      padding-right: 10px;
    }

    #buttonStyle {
      /* background: none;
      outline: none;
      border: none;
      */
      line-height: 1;
      font-weight: 480;
      font-size: 1.1rem;
      color: #aaa;
      width: 40%;
      border-radius: 10px;
      height: 50%;
      margin-top: 14px;
      border: none;
      border-radius: 55px;
      cursor: pointer;
      font-family: "Poppins", sans-serif;
    }

    #buttonStyle:hover {
      color: white;
      background-color: gray;
      border: 1px solid gray;
      transition: 0.5s;
    }

    #errormsg {
      margin-left: 0px;
      font-family: "Poppins", sans-serif;
      color: #aaa;
    }
  </style>
  <title>Login / Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" enctype="multipart/form-data" class="sign-in-form">
          <h2 class="title">Login</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" name="eml" id="eml" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" id="pass" placeholder="Password" />
          </div>
          <input type="submit" value="Login" name="login" class="btn solid" />

        </form>
        <form action="" method="post" enctype="multipart/form-data" class="sign-up-form">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="name" id="name" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="pwd" id="pwd" placeholder="Password" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="cpwd" id="cpwd" placeholder="Confirm Password" />
          </div>
          <div class="input-field">
            <i class="fas fa-phone"></i>
            <input type="number" name="mobno" id="mobno" placeholder="Phone Number" />
          </div>
          <div class="input-field1">
            <i class="fas fa-image"></i>
            <!-- <input type="file" id="file-input" name="file-input" /> -->
            <input type="file" id="InputFile" onchange="selectFile();" name="photo" hidden="hidden" />
            <!-- accept="image/png, image/jpeg" -->
            <button type="button" id="buttonStyle" onclick="FileUpload();">Choose Image</button>&nbsp;|
            <label id="errormsg">No image chosen.</label><br><br>
            <!-- <label id="file-input-label" for="file-input">Select Image</label> -->
            <!-- <input type="file" name="" id="" placeholder="Image" /> -->
          </div>
          <input type="submit" class="btn" name="signup" value="Sign up" />

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Not a member ?</h3>
          <p>
            First you create account then you can login
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <!-- <img src="login.svg" class="image" alt="" /> -->
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Already a member ?</h3>
          <p>
            You already created an account so please login
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Login
          </button>
        </div>
        <!-- <img src="reg.svg" class="image" alt="" /> -->
      </div>
    </div>
  </div>

  <script src="appa.js"></script>
  <script>
    function FileUpload() {
      document.getElementById('InputFile').click();
    }

    function selectFile() {
      if (document.getElementById('InputFile').value) {
        document.getElementById('errormsg').innerHTML = document.getElementById('InputFile').value.match(
          /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
      } else {
        document.getElementById('errormsg').innerHTML = "No image chosen.";
      }
    }
  </script>

</body>

</html>