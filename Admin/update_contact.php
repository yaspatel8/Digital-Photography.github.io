<?php
include("hhh.php");
include("connection.php");

$id = $_GET['x'];
$alert = '';

$qry1 = mysqli_query($con, "select * from contact_us where id=$id");

                while ($row1 = mysqli_fetch_array($qry1)) {

if (isset($_POST["btnsub"])) {
    $phone=trim($_POST['phone']);
    $email=trim($_POST['email']);
    $address=trim($_POST['address']);
    $fburl=trim($_POST['fburl']);
    $instaurl=trim($_POST['instaurl']);
    $xurl=trim($_POST['xurl']);

    $qry = mysqli_query($con, "update contact_us set address='$address',phone='$phone',email='$email',fburl='$fburl',instaurl='$instaurl',xurl='$xurl' where id='$id'");
    if($qry)
    {
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Inserted!</div>";
        echo "<script>window.location.assign('contact_usview.php')</script>";
    }    
    else
    {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Inserted!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h4 class="page-title mb-1 text-primary">Contact_Us</h4>
        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Phone Number</label>
                    <div class="col-md-9">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="<?php echo $row1['phone']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Email</label>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $row1['email']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Address</label>
                    <div class="col-md-9">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo $row1['address']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">FaceBook Url</label>
                    <div class="col-md-9">
                        <input type="text" name="fburl" class="form-control" id="fburl" placeholder="FB Url" value="<?php echo $row1['fburl']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Instagram Url</label>
                    <div class="col-md-9">
                        <input type="text" name="instaurl" class="form-control" id="instaUrl" placeholder="Insta Url" value="<?php echo $row1['instaurl']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">X Url</label>
                    <div class="col-md-9">
                        <input type="text" name="xurl" class="form-control" id="xurl" placeholder="X Url" value="<?php echo $row1['xurl']; ?>" required>
                    </div>
                </div>
                
                
                <div class="form-group mb-0 mt-4 row justify-content-end">
                    <div class="col-md-9">
                        <input type="Submit" class="btn btn-primary" name="btnsub" value="Update">

                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
    </div>

</body>

</html>
<?php
include("fff.php");
?>