<?php
include_once("hhh.php");
include_once("connection.php");

$cid = $_GET['x'];
$qry = mysqli_query($con, "select * from catrgory_master where cid=$cid");
$name  = $detail  = $photo = $alert = '';

$row = mysqli_fetch_array($qry);

if (isset($_POST['btnsub'])) {

    if ($_FILES['pic']['name'] != "") {
        $photo = $_FILES['pic']['name'];
        $dest = "../product_image/" . $photo;
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
    } else {
        $photo = $_POST['oldimage'];
    }

    $name = trim($_POST["cname"]);
    $detail = trim($_POST["cdetail"]);

    $qry = mysqli_query($con, "update catrgory_master set cname='$name',photo='$photo',detail='$detail',cdate=now() where cid='$cid'");

    if ($qry) {
        
        
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Updated!</div>";
        echo "<script>window.location.assign('category.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Updated!</div>";
    }
}
if (isset($_POST['close'])) {
    echo "<script>window.location.assign('category.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
    <script src="jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn").click();
        });
    </script>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-1 text-primary">Category</h4>
            </div>
            <div class="btn-list">
                <div class="card" id="modal">
                    <button class="btn btn-primary" style="margin-left: 100vh; margin-top:1vh;" data-bs-target="#modaldemo1" id="btn" data-bs-toggle="modal">Update New Tools</button>
                </div>
            </div>
            <div class="modal fade" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Update Tools</h6>
                        </div>
                        <div class="modal-body">
                            <form method="post" autocomplete="off" enctype="multipart/form-data">
                                <label>Enter Name:</label>
                                <input type="text" class="form-control" name="cname" id="cname" value="<?php echo $row['cname']; ?>" required><br>
                                <label>Enter Details:</label>
                                <textarea name="cdetail" id="cdetail" class="form-control"  required><?php echo $row['detail']; ?></textarea>
                                
                                <label>Old Image</label>
                                <img src="../product_image/<?php echo $row['photo']; ?>" style="height: 100px;"><br><br>
                                <input type="hidden" name="oldimage" value="<?php echo $row['photo']; ?>">
                                

                                <div class="form-group">
                                    <label class="image">Upload Image:</label>
                                    <input type="file" name="pic" id="image" class="form-control" value="<?php echo $row['photo'] ?>" >
                                </div>
                                
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Edit" name="btnsub">
                                    <input class="btn btn-secondary" data-bs-dismiss="modal" name="close" value="Close" type="submit">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">
            <div class="">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered text-nowrap key-buttons">
                        <center>
                            <thead>

                                <tr>
                                    <th class="border-bottom-3 font-weight-bold fs-16">No.</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Photo</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Name</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Details</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Date & Time</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Status</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = mysqli_query($con, "select * from catrgory_master");
                                while ($row = mysqli_fetch_array($qry)) {
                                ?>

                                    <tr class="text text-center">
                                        <td class="fs-14"><?php echo $row['cid'] ?></td>
                                        <td><?php echo "<span class='avatar avatar-xl bradius' style='background-image: url(../product_image/$row[photo])'></span>" ?></td>
                                        <td class="fs-14"><?php echo $row['cname'] ?></td>
                                        <td class="fs-14"><?php echo $row['detail'] ?></td>
                                        <td class="fs-14"><?php echo $row['cdate'] ?></td>
                                        <td class="fs-14"><?php echo $row['status'] ?></td>
                                        <td class="fs-14">Edit | Delete</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </center>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once("fff.php");
    ?>
    <script src="assets/plugins/datatables/DataTables/js/jquery.dataTables.js"></script>
    <script src="assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/JSZip/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/js/datatables.js"></script>

</body>

</html>