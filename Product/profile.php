<?php

session_start();

$uid = $_SESSION['uid'];
if (!isset($uid))
    echo "<script>window.location.assign('../user/login.php');</script>";
    
include_once("hhh.php");
include_once("connection.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto: 300, 400, 500, 700&display=swap">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> -->
    <style>
        .heading {
            font-size: large;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="tt-heading tt-heading-lg padding-on text-center">
            <div class="tt-heading-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->
                <h1 class="tt-heading-title">Profile</h1>
                <hr class="hr-short">
            </div> <!-- /.tt-heading-inner -->
        </div>


        <div class="col-sm-md-lg-xs-12">

            <?php
            $uid = $_SESSION['uid'];
            
            $qry = mysqli_query($con, "select * from user where uid=$uid");
            while($row=mysqli_fetch_array($qry)){
            ?>
            <center>
                <img src="../user_image/<?php echo "$row[photo]"; ?>" alt="" height="120vh" width="120vh">
                <h4><?php echo"$row[fname]"; ?> <?php echo"$row[lname]"; ?></h4>
                <p class="text-secondary mb-1"><?php echo"$row[email]"; ?></p>

                <table class="table text-center">
                    <thead>
                        
                        <tr>
                        <td><a href="editprofile.php" class="btn btn-pill btn-success" onclick="javascript: return confirm('Do Edit?')">Edit</a>   
                        <!-- <td><a href="vieworder.php" class="btn btn-pill btn-success" >Order</a>    -->
                        </tr>
                        <tr>
                            <td class="heading">Phone No</td>
                            <td><?php echo "$row[phone]"; ?></td>
                        </tr>
                        <tr>
                            <td class="heading">Address</td>
                            <td><?php echo"$row[address]"; ?></td>
                        </tr>
                        <tr>
                            <td class="heading">Gender</td>
                            <td><?php echo"$row[gender]"; ?></td>
                        </tr>
                        <tr>
                            <td class="heading">Date Of Birth</td>
                            <td><?php echo"$row[dob]"; ?></td>
                        </tr>
                        <tr>
                            <td class="heading">Password</td>
                            <td><?php echo"$row[password]"; ?></td>
                        </tr>
                    </thead>
                </table>
            </center>
            <?php } ?>
        </div>

    </div>

</body>

</html>
<?php
include_once("fff.php");
?>