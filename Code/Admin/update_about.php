<?php
include("hhh.php");
include("connection.php");

$alert = '';
$id = $_GET['x'];

$qry1 = mysqli_query($con, "select * from about where id=$id");

                while ($row1 = mysqli_fetch_array($qry1)) {


if (isset($_POST["btnsub"])) {
    
    if ($_FILES['pic']['name'] != "") {
        $photo = $_FILES['pic']['name'];
        $dest = "../Image/" . $photo;
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
    } else {
        $photo = $_POST['oldimage'];
    }
    
    $title = trim($_POST["title"]);
    $detail = trim($_POST["detail"]);


    $qry = mysqli_query($con, "update about set title='$title',image='$photo',description='$detail' where id=$id");
    if ($qry) {
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        // echo "<script> alert('Inserted Successful..');</script>";
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Inserted!</div>";
        echo "<script>window.location.assign('about_usview.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Inserted!</div>";
        // echo "<script> alert(' Not Inserted Successful..');</script>";
    }
}
    // if (isset($_POST['close'])) {
    //     echo "<script>window.location.assign('about_usview.php')</script>";
    // }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
                        <label class="col-md-3 from-label">Old Image</label>
                        <div class="col-md-9">
                            <img src="../Images/<?php echo $row1['image']; ?>" style="height: 100px;"><br><br>
                            <input type="hidden" name="oldimage" value="<?php echo $row1['image']; ?>">
                        </div>
                    </div>

                <div class="form-group row">
                    <label class="col-md-3 form-label">Upload Image</label>
                    <div class="col-md-9">
                        <input type="file" name="pic" id="image" value="<?php echo $row1['image'] ?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Title</label>
                    <div class="col-md-9">
                        <input type="text" name="title" class="form-control" id="title" value="<?php echo $row1['title'] ?>" placeholder="Title" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-3 form-label">Description</label>
                    <div class="col-md-9">
                        <textarea name="detail" id="detail" class="form-control"><?php echo $row1['description'] ?></textarea>
                    </div>
                </div>

                <div class="form-group mb-0 mt-4 row justify-content-end">
                    <div class="col-md-9">
                        <input type="Submit" class="btn btn-primary" name="btnsub" value="Update">
                        <!-- <input type="submit" class="btn btn-secondary" name="close" value="close"> -->

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