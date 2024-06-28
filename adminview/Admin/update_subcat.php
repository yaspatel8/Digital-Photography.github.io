<?php
include_once("hhh.php");
include_once("connection.php");

$sid = $_GET['x'];

$alert = '';
 $qry1 = mysqli_query($con, "select * from sub_category where sid=$sid");

                while ($row1 = mysqli_fetch_array($qry1)) {

                
if (isset($_POST["btnsub"])) {

    if ($_FILES['pic']['name'] != "") {
        $photo = $_FILES['pic']['name'];
        $dest = "../product_image/" . $photo;
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
    } else {
        $photo = $_POST['oldimage'];
    }

    $cid = trim($_POST["cid"]);
    $name = trim($_POST["sname"]);
    $detail = trim($_POST["sdetail"]);

    $qry = mysqli_query($con, "update sub_category set cid='$cid',sname='$name',sdetail='$detail',sphoto='$photo',sdate=now() where sid='$sid'");
    if ($qry) {
        // move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        // echo "<script> alert('Inserted Successful..');</script>";
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data updated!</div>";
        echo "<script>window.location.assign('sub_catview.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not updated!</div>";
        // echo "<script> alert(' Not Inserted Successful..');</script>";
    }
}
if (isset($_POST['close'])) {
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
            <h4 class="page-title mb-1 text-primary">Update Sub Category</h4>
        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="inputName" class="col-md-3 form-label">Select Category</label>
                        <div class="col-md-9">


                            <select name="cid" id="cid" class="form-select border border-2 shadow bg-white text-dark ">
                                
                                <?php
                                $qry2 = mysqli_query($con, "select * from catrgory_master");
                                if ($qry2) {
                                    while ($row = mysqli_fetch_array($qry2)) { ?>
                                            <option value="<?php echo $row['cid'] ?>"
                                            <?php 

                                            if($row1['sid'] == $row['cid'])
                                            {
                                                echo "selected";
                                            }
                                            ?>
                                            >
                                            <?php echo $row['cname'] ?>
                                        </option>        
                                        
                                        <?php 
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
                            <input type="text" name="sname" class="form-control" id="sname" placeholder="Sub category Name" value="<?php echo $row1['sname']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-md-3 form-label">Detail</label>
                        <div class="col-md-9">
                            <textarea name="sdetail" id="sdetail" class="form-control"><?php echo $row1['sdetail']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 from-label">Old Image</label>
                        <div class="col-md-9">
                            <img src="../product_image/<?php echo $row1['sphoto']; ?>" style="height: 100px;"><br><br>
                            <input type="hidden" name="oldimage" value="<?php echo $row1['sphoto']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 form-label">Upload Image</label>
                        <div class="col-md-9">
                            <input type="file" name="pic" id="image" class="form-control" value="<?php echo $row1['sphoto']; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-4 row justify-content-end">
                        <div class="col-md-9">
                            <input type="Submit" class="btn btn-primary" name="btnsub" value="Update">
                            <input type="submit" class="btn btn-secondary" name="close" value="close">
                        </div>
                    </div>
                <?php } ?>
            </form>

        </div>
    </div>
    </div>

</body>

</html>
<?php
include_once("fff.php");
?>