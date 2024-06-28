<?php
include_once("hhh.php");
include_once("connection.php");

$alert='';

if (isset($_POST["btnsub"])) {
    $cid=trim($_POST["cid"]);
    $name = trim($_POST["sname"]);

    $photo = trim($_FILES["pic"]["name"]);
    $dest="../product_image/" .$photo;

    $qry = mysqli_query($con, "insert into sub_category values('','$cid','$name','$photo',0,now())");
    if ($qry) {
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        // echo "<script> alert('Inserted Successful..');</script>";
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Inserted!</div>";
        echo "<script>window.location.assign('sub_catview.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Inserted!</div>";
        // echo "<script> alert(' Not Inserted Successful..');</script>";
    }
}
if (isset($_POST["close"])) {
    echo "<script>window.location.assign('sub_catview.php')</script>";
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
            <h4 class="page-title mb-1 text-primary">Add Sub Category</h4>
        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Select Category</label>
                    <div class="col-md-9">

                        <!-- <div class="col-md-3"> -->
                        <!-- <button type="button" class="btn btn-light btn-pill dropdown-toggle" data-bs-toggle="dropdown">
                                Select Category<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>Action</li>
                                <li>Another action</li>
                                <li>Something else here</li>
                            </ul> -->
                        <select name="cid" id="cid" class="form-select border border-2 shadow bg-white text-dark " required>
                            <option value="" selected disabled>Select Category</option>
                            <?php
                            $qry = mysqli_query($con, "select * from catrgory_master");
                            if ($qry) {
                                while ($row = mysqli_fetch_array($qry)) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                            }
                            ?>
                        </select>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Sub category Name</label>
                    <div class="col-md-9">
                        <input type="text" name="sname" class="form-control" id="sname" placeholder="Sub category Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-label">Upload Image</label>
                    <div class="col-md-9">
                        <input type="file" name="pic" id="image" required class="form-control" required>
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
include_once("fff.php");
?>