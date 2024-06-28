<?php
include_once("hhh.php");
include_once("connection.php");

$sid = $_GET['x'];

$alert = '';
$qry1 = mysqli_query($con, "select * from packagesub_category where sid=$sid");

while ($row1 = mysqli_fetch_array($qry1)) {


    if (isset($_POST["btnsub"])) {

        if ($_FILES['pic']['name'] != "") {
            $photo = $_FILES['pic']['name'];
            $dest = "../package_image/" . $photo;
            move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        } else {
            $photo = $_POST['oldimage'];
        }

        $cid = trim($_POST["cid"]);
        $name = trim($_POST["sname"]);
        // $subtitle = trim($_POST["subtitle"]);
        $price = trim($_POST["price"]);
        $detail = trim($_POST["content"]);

        $qry = mysqli_query($con, "update packagesub_category set cid='$cid',sname='$name',price='$price',sdetail='$detail',sphoto='$photo',sdate=now() where sid='$sid'");
        if ($qry) {
            // move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
            // echo "<script> alert('Inserted Successful..');</script>";
            $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data updated!</div>";
            echo "<script>window.location.assign('packagesub_categoryview.php')</script>";
        } else {
            $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not updated!</div>";
            // echo "<script> alert(' Not Inserted Successful..');</script>";
        }
    }
    if (isset($_POST['close'])) {
        echo "<script>window.location.assign('packagesub_categoryview.php')</script>";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 30vh;
            }
        </style>
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
                                $qry2 = mysqli_query($con, "select * from packagecategory_master");
                                if ($qry2) {
                                    while ($row2 = mysqli_fetch_array($qry2)) { ?>
                                        <option value="<?php echo $row2[0] ?>" <?php

                                                                                if ($row1['sid'] == $row2['cid']) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>
                                            <?php echo $row2[1] ?>
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
                        <label for="inputName" class="col-md-3 form-label">Price</label>
                        <div class="col-md-9">
                            <input type="text" name="price" class="form-control" id="price" placeholder="price" value="<?php echo $row1['price']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-md-3 form-label">Detail</label>
                        <div class="col-md-9">
                            <textarea id="content" name="content" class="form-control"><?php echo $row1['sdetail']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 from-label">Old Image</label>
                        <div class="col-md-9">
                            <img src="../package_image/<?php echo $row1['sphoto']; ?>" style="height: 100px;"><br><br>
                            <input type="hidden" name="oldimage" value="<?php echo $row1['sphoto']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 form-label">Upload Image</label>
                        <div class="col-md-9">
                            <input type="file" name="pic" id="image" accept=".jpg,.png,.webp,.jpeg" class="form-control" value="<?php echo $row1['sphoto']; ?>">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                ckfinder: {
                    uploadUrl: 'fileupload.php'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <?php
    include_once("fff.php");
    ?>