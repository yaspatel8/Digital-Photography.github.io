<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
include_once("connection.php");

$alert='';

if (isset($_POST["btnsub"])) {
    $cid=trim($_POST["cid"]);
    $name = trim($_POST["sname"]);
    
    $price = trim($_POST["price"]);

    $detail = trim($_POST["content"]);

    $photo = trim($_FILES["pic"]["name"]);
    $dest="../package_image/" .$photo;

    $qry = mysqli_query($con, "insert into packagesub_category values('','$cid','$name','$price','$detail','$photo',0,now())");
    if ($qry) {
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        // echo "<script> alert('Inserted Successful..');</script>";
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Inserted!</div>";
        echo "<script>window.location.assign('packagesub_categoryview.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Inserted!</div>";
        // echo "<script> alert(' Not Inserted Successful..');</script>";
    }
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
                                <li>Engagement</li>
                                <li>Wedding</li>
                                <li>Baby Shower</li>
                                <li>Studio</li>
                            </ul> -->
                        <select name="cid" id="cid" class="form-select border border-2 shadow bg-white text-dark " required>
                            <option value="" selected disabled>Select Category</option>
                            <?php
                            $qry = mysqli_query($con, "select * from packagecategory_master");
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
                    <label for="inputName" class="col-md-3 form-label">Price</label>
                    <div class="col-md-9">
                        <input type="text" name="price" class="form-control" id="price" placeholder="price" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-3 form-label">Detail</label>
                    <div class="col-md-9">
                        <textarea id="content" name="content" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-label">Upload Image</label>
                    <div class="col-md-9">
                        <input type="file" name="pic" id="image" accept=".jpg,.png,.webp,.jpeg" required class="form-control" required>
                    </div>
                </div>
                <div class="form-group mb-0 mt-4 row justify-content-end">
                    <div class="col-md-9">
                        <input type="Submit" class="btn btn-primary" name="btnsub" value="Insert">
                        <input type="reset" class="btn btn-secondary" value="Reset">
                    </div>
                </div>
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
            ckfinder:
            {
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