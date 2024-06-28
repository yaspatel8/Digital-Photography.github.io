<?php
include("hhh.php");
include("connection.php");

$pid = $_GET['x'];
$alert = '';

$qry1 = mysqli_query($con, "select * from package_master where pid=$pid");

                while ($row1 = mysqli_fetch_array($qry1)) {


if (isset($_POST["btnsub"])) {

    if ($_FILES['pic']['name'] != "") {
        $photo = $_FILES['pic']['name'];
        $dest = "../product_image/" . $photo;
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
    } else {
        $photo = $_POST['oldimage'];
    }


    $sid = trim($_POST["sid"]);
    $name = trim($_POST["pname"]);
    $detail = trim($_POST["pdetail"]);
    $price = trim($_POST["price"]);
    $qty = trim($_POST["qty"]);

    $qry = mysqli_query($con, "update package_master set sid='$sid',pname='$name',description='$detail',price=$price,qty=$qty,photo='$photo',order_date=now() where pid='$pid'");

    if ($qry) {
        // move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        // echo "<script> alert('Inserted Successful..');</script>";
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Product Inserted!</div>";
        echo "<script>window.location.assign('package_view.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Product updated!</div>";
        // echo "<script> alert(' Not Inserted Successful..');</script>";
    }
}
if (isset($_POST['close'])) {
    echo "<script>window.location.assign('package_view.php')</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function getXMLHTTP() {
            var xmlhttp = false;
            xmlhttp = new XMLHttpRequest();
            return xmlhttp;
        }

        function getState(cid) {

            var strURL = "find_package.php?cid=" + cid;

            var req = getXMLHTTP();
            if (req) {
                req.onreadystatechange = function() {
                    if (req.readyState == 4 && req.status == 200) {
                        document.getElementById('sid').innerHTML = req.responseText;
                    }
                }
                req.open("GET", strURL, true);
                req.send();
            }
        }
    </script>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h4 class="page-title mb-1 text-primary">Update Package</h4>
        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Select Category</label>
                    <div class="col-md-9">
                        <select name="cid" id="cid" class="form-select border border-2 shadow bg-white text-dark " onchange="getState(this.value)" required>
                            <!-- <option value="" selected disabled>Select Category</option> -->
                            <?php
                            $qry = mysqli_query($con, "select * from packagecategory_master");
                            if ($qry) {
                                while ($row = mysqli_fetch_array($qry)) {
                                    echo "<option value=$row[0]>$row[1]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="inputName" class="col-md-3 mt-4 form-label">Select Sub Category</label>
                        <div class="col-md-9">

                            <select name="sid" id="sid" class="form-select border mt-3 border-2 shadow bg-white text-dark " required>
                                <!-- <option value="" selected disabled>Select Sub Category</option> -->
                                <?php
                                $qry2 = mysqli_query($con, "select * from packagesub_category");
                                if ($qry2) {
                                    while ($row = mysqli_fetch_array($qry2)) { ?>
                                            <option value="<?php echo $row['sid'] ?>"
                                            <?php 

                                            if($row1['pid'] == $row['sid'])
                                            {
                                                echo "selected";
                                            }
                                            ?>
                                            >
                                            <?php echo $row['sname'] ?>
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
                        <label for="inputName" class="col-md-3 form-label">Package Name</label>
                        <div class="col-md-9">
                            <input type="text" name="pname" class="form-control" id="pname" placeholder="Package Name" value="<?php echo $row1['pname']; ?>"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-md-3 form-label">Detail</label>
                        <div class="col-md-9">
                            <textarea name="pdetail" id="pdetail" class="form-control"><?php echo $row1['description']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-md-3 form-label">Price</label>
                        <div class="col-md-9">
                            <input type="text" name="price" class="form-control" id="price" placeholder="Product Price" value="<?php echo $row1['price']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-md-3 form-label">No. of Packages</label>
                        <div class="col-md-9">
                            <input type="text" name="qty" class="form-control" id="qty" placeholder="number of packages you want to update" value="<?php echo $row1['qty']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 from-label">Old Image</label>
                        <div class="col-md-9">
                            <img src="../product_image/<?php echo $row1['photo']; ?>" style="height: 100px;"><br><br>
                            <input type="hidden" name="oldimage" value="<?php echo $row1['photo']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 form-label">Upload Image</label>
                        <div class="col-md-9">
                            <input type="file" name="pic" id="image"  class="form-control" value="<?php echo $row1['photo']; ?>" >
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-4 row justify-content-end">
                        <div class="col-md-9">
                            <input type="Submit" class="btn btn-primary" name="btnsub" value="Update">
                            <input type="reset" class="btn btn-secondary" name="close" value="Close">
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
include("fff.php");
?>