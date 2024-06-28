<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
include_once("connection.php");

$alert = '';

if (isset($_POST["btnsub"])) {
    $phone=trim($_POST['phone']);
    $email=trim($_POST['email']);
    $address=trim($_POST['address']);
    $fburl=trim($_POST['fburl']);
    $instaurl=trim($_POST['instaurl']);
    $xurl=trim($_POST['xurl']);

    $qry = mysqli_query($con, "insert into contact_us values('','$address','$phone','$email','$fburl','$instaurl','$xurl')");
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
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Email</label>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Address</label>
                    <div class="col-md-9">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">FaceBook Url</label>
                    <div class="col-md-9">
                        <input type="text" name="fburl" class="form-control" id="fburl" placeholder="FB Url" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Instagram Url</label>
                    <div class="col-md-9">
                        <input type="text" name="instaurl" class="form-control" id="instaUrl" placeholder="Insta Url" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">X Url</label>
                    <div class="col-md-9">
                        <input type="text" name="xurl" class="form-control" id="xurl" placeholder="X Url" required>
                    </div>
                </div>
                
                
                <div class="form-group mb-0 mt-4 row justify-content-end">
                    <div class="col-md-9">
                        <input type="Submit" class="btn btn-primary" name="btnsub" value="Insert">

                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

</body>

</html>
<?php
include("fff.php");
?>