<?php
session_start();
include_once("hhh.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card main-content-body-profile">

                <div class="tab-content">

                    <div class="profile-cover__img">
                        <?php
                        $id = $_SESSION['id'];
                        $qry = mysqli_query($con, "select * from photographer where id=$id");
                        while ($row = mysqli_fetch_array($qry)) {
                        ?>
                            <img src="../Photographer/Images/<?php echo $row['photo']; ?>" width="300vh" height="130vh" alt="img">
                            <h3 class="h3"><?php echo "$row[name]"; ?></h3>
                        <?php } ?>
                    </div>

                    <div class="profile-tab tab-menu-heading">
                        <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100" style="margin-top: 35vh;">
                            <a class="nav-link  active" data-bs-toggle="tab" href="#about">About</a>
                            <a class="nav-link" data-bs-toggle="tab" href="#edit">Edit Profile</a>
                            <a class="nav-link" data-bs-toggle="tab" href="#gallery">Gallery</a>
                            <a class="nav-link" data-bs-toggle="tab" href="#video">Video</a>
                        </nav>
                    </div>
                    <?php
                    $id = $_SESSION['id'];
                    $qry = mysqli_query($con, "select * from photographer where id=$id");
                    while ($row = mysqli_fetch_array($qry)) {
                    ?>
                        <div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
                            <div class="card-body p-0 border p-0 rounded-10">
                                <div class="p-4">

                                    <h4 class="tx-15 text-uppercase mb-3" style="margin-top: 6vh;">Name</h4>
                                    <p class="m-b-5"><?php echo "$row[name]"; ?></p>
                                    <div class="m-t-30">
                                        <h4 class="tx-15 text-uppercase mt-3">Email</h4>
                                        <div class=" p-t-10">
                                            <p class=""><?php echo "$row[email]"; ?></p>
                                            <h4 class="tx-15 text-uppercase mt-3">Address</h4>
                                            <p class=""><?php echo "$row[address]"; ?></p>
                                            <h4 class="tx-15 text-uppercase mt-3">Proof Id</h4>
                                            <p class=""><?php echo "$row[proof_id]"; ?></p>
                                            <h4 class="tx-15 text-uppercase mt-3">Password</h4>
                                            <p class=""><?php echo "$row[password]"; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top"></div>
                                <div class="p-4">
                                    <label class="main-content-label tx-13 mg-b-20">Contact</label>
                                    <div class="d-sm-flex">
                                        <div class="mg-sm-r-20 mg-b-10">
                                            <div class="main-profile-contact-list">
                                                <div class="media">
                                                    <div class="media-icon bg-primary-transparent text-primary"> <i class="icon ion-md-phone-portrait"></i> </div>
                                                    <div class="media-body"> <span>Mobile</span>
                                                        <div> +91 <?php echo "$row[phone]"; ?> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="border-top"></div>
                                <div class="p-3 p-sm-4">
                                    <label class="main-content-label tx-13 mg-b-20">Id Proof</label>
                                    <div class="d-xl-flex">
                                        <div class="mg-md-r-20 mg-b-10">
                                            <div class="main-profile-social-list">
                                                <div class="media">

                                                    <img src="../Photographer/Images/<?php echo $row['proof']; ?>" height="200vh" alt="">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="main-content-body tab-pane p-4 border-top-0" id="edit">
                        <div class="card-body border">
                            <div class="mb-4 main-content-label">Personal Information</div>
                            <?php
                    $id = $_SESSION['id'];
                    $qry = mysqli_query($con, "select * from photographer where id=$id");
                    while ($row = mysqli_fetch_array($qry)) {

                        if (isset($_POST["btnsub"])) {
                            // echo"<script>alert('hi');</script>";
                            if ($_FILES['pic']['name'] != "") {
                                $photo = $_FILES['pic']['name'];
                                $dest = "../Photographer/Images/" . $photo;
                                move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
                            } else {
                                $photo = $_POST['oldimage'];
                            }

                            if($_POST['txtpass']!="")
                            {
                                $password = trim($_POST["txtpass"]);
                            }
                            else
                            {
                                $password=trim($_POST["oldpass"]);
                            }
                            
                            $name = trim($_POST["txtname"]);
                            $email = trim($_POST["txtemail"]);
                            $phono = trim($_POST["txtphone"]);
                            $address = trim($_POST["txtadd"]);
                            
                            // $cpassword = trim($_POST["txtconfirm"]);
                            

                                $qry2 = mysqli_query($con, "update photographer set name='$name',email='$email',address='$address',phone='$phono',password='$password',photo='$photo' where id=$id");
                                if ($qry2) {
                                    $id = $_SESSION['id'];
                                    
                                 
                                    echo "<script> alert('updated Successful..');</script>";
                                    echo "<script>window.location.assign('profile.php')</script>";
                                } else {
                    
                                    // echo "<script> alert(' Not Update Data..');</script>";
                                }
                            }

                                           
                    ?>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label"> Profile Image</label>
                                        </div>
                                        <div class="col-md-9">
                                            <img src="../Photographer/Images/<?php echo $row['photo']; ?>" alt="" height="120vh" width="120vh">
                                            <input type="hidden" name="oldimage" value="<?php echo $row['photo']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">New Profile </label>
                                        </div>
                                        <div class="col-md-9">
                                        <input type="file" name="pic" id="image" class="form-control" value="<?php echo $row['photo']; ?>"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label"> Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="txtname" placeholder="Name" value="<?php echo "$row[name]"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="txtemail" placeholder="Email" readonly value="<?php echo "$row[email]"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Mobile</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Mobile Number" name="txtphone" value="<?php echo "$row[phone]"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Address</label>
                                        </div>
                                        <div class="col-md-9">
                                          <textarea name="txtadd" id="txtadd" class="form-control" rows="3"><?php echo "$row[address]"; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Proof</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label class="rdiobox"><input type="radio" name="idp" id="Aadhaar Card" value="Aadhaar Card" <?php 
                                            if($row['proof_data']=="Aadhaar Card")
                                            {
                                                echo "checked";
                                            }?>
                                            > <span>Aadhaar Card</span></label>
                                            <label class="rdiobox"><input type="radio" name="idp" id="PAN Card" value="PAN Card" <?php 
                                            if($row['proof_data']=="PAN Card")
                                            {
                                                echo "checked";
                                            }?>> <span>PAN Card</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Proof Id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Designation" value="<?php echo "$row[proof_id]"; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Old Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="oldpass" class="form-control"  placeholder="Old Password" value="<?php echo "$row[password]"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">New Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="txtpass" placeholder="New Password" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Confirm Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="txtconfirm" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <input type="submit" class="btn ripple btn-primary" name="btnsub" value="Edit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="main-content-body p-4 border tab-pane border-top-0" id="gallery">

                        <div class="card-body border">
                            <div class="demo-gallery">
                                <ul id="lightgallery" class="list-unstyled row row-sm">
                                    <?php
                                    $qry = mysqli_query($con, "select * from gallery where pid=$id");
                                    while ($row = mysqli_fetch_array($qry)) {
                                    ?>
                                        <li class="col-sm-6 col-lg-4">
                                            <a class="wd-100p"><img class="img-responsive mb-4 wd-100p" src="../Photographer/Images/<?php echo "$row[image]"; ?>" height="250vh"> </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <!-- /Gallery -->
                            </div>
                        </div>

                    </div>
                    <div class="main-content-body p-4 border tab-pane border-top-0" id="video">

                        <div class="card-body border">
                            <div class="demo-gallery">
                                <ul id="lightgallery" class="list-unstyled row row-sm">
                                    <?php
                                    $qry = mysqli_query($con, "select * from video where pid=$id");
                                    while ($row = mysqli_fetch_array($qry)) {
                                    ?>
                                        <li class="col-sm-6 col-lg-4">
                                            <a class="wd-100p"><video src="<?php echo"../Photographer/video/$row[video]" ?>" controls muted autoplay height="180"></video> </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <!-- /Gallery -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>


</body>

</html>
<?php
include_once("fff.php");
?>