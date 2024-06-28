<?php
include_once("hhh.php");
include_once("connection.php");

$id = $_GET['x'];
$qry1 = mysqli_query($con, "select * from product_image where id=$id");

$name  = $detail  = $phono = $alert = '';

$row1 = mysqli_fetch_array($qry1);

if (isset($_POST['btnsub'])) {

    if ($_FILES['pic']['name'] != "") {
        $photo = $_FILES['pic']['name'];
        $dest = "../product_image/" . $photo;
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
    } else {
        $photo = $_POST['oldimage'];
    }
    $pid = trim($_POST["pid"]);

    $qry = mysqli_query($con, "update product_image set pid='$pid',image='$photo',date=now() where id='$id'");

    if ($qry) {
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Inserted!</div>";
        echo "<script>window.location.assign('product_image.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Inserted!</div>";
    }
}
if (isset($_POST['close'])) {
    echo "<script>window.location.assign('product_image.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product image</title>
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
                <h4 class="page-title mb-1 text-primary">Product Image</h4>
            </div>
            <div class="btn-list">
                <div class="card" id="modal">
                    <button class="btn btn-primary" style="margin-left: 100vh; margin-top:1vh;" data-bs-target="#modaldemo1" id="btn" data-bs-toggle="modal">Update Product Image</button>
                </div>
            </div>
            <div class="modal fade" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Add Product image</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" autocomplete="off" enctype="multipart/form-data">

                                <label>Select Product</label>
                                <select name="pid" id="pid" class="form-select border border-2 shadow bg-white text-dark" required>
                                    <option value="" selected disabled>Select Product</option>
                                    <?php
                                    $qry = mysqli_query($con, "select * from product_master");
                                    if ($qry) {
                                        while ($row = mysqli_fetch_array($qry)) {
                                            echo "<option value='$row[0]'>$row[2]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <label>Old Image</label>
                                <img src="../product_image/<?php echo $row1['image']; ?>" style="height: 100px;padding-top:10px;"><br><br>
                                <input type="hidden" name="oldimage" value="<?php echo $row1['image']; ?>">

                                <div class="form-group">
                                    <label class="image">Upload Image:</label>
                                    <input type="file" name="pic" id="image" class="form-control">
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
                                    <th class="border-bottom-3 font-weight-bold fs-16">Product Name</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Photo</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = mysqli_query($con, "select * from product_image inner join product_master on product_image.pid=product_master.pid");
                                while ($row = mysqli_fetch_array($qry)) {
                                ?>

                                    <tr class="text text-center">
                                        <td class="fs-14"><?php echo $row['pname'] ?></td>
                                        <td><?php echo "<span class='avatar avatar-xl bradius' style='background-image: url(../product_image/$row[image])'></span>" ?></td>
                                        <td class="fs-14"><?php echo $row['date'] ?></td>

                                        <td class="fs-14"><a href="update_image.php?x=<?php echo $row['id']; ?>" class="btn btn-pill btn-primary" onclick="javascript: return confirm('Do Edit?')">Edit</a> |
                                            <a href="delete_image.php?x=<?php echo $row['id']; ?>" class="btn btn-pill btn-danger" onclick="javascript: return confirm('Do Delete?')">Delete</a>

                                        </td>
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