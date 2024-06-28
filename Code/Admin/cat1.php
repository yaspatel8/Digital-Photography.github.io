<?php
include_once("hhh.php");
include_once("connection.php");

$alert='';

if (isset($_POST["btnsub"])) {
    
    $name = trim($_POST["cname"]);
    
    $detail = trim($_POST["content"]);

    $photo = trim($_FILES["pic"]["name"]);
    $dest="../package_image/" .$photo;

    $qry1 = mysqli_query($con, "select * from packagecategory_master where cname='$name'");
    if(mysqli_num_rows($qry1)>0)
    {
        echo "<script> alert('Catergory already inseted You not insert again!..');</script>";
        echo "<script>window.location.assign('packagecategory.php')</script>";
    }
    else
    {
        $qry = mysqli_query($con, "insert into packagecategory_master values('','$name','$photo','$detail',0,now())");
        if ($qry) {
            move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
            // echo "<script> alert('Inserted Successful..');</script>";
            $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Inserted!</div>";
            echo "<script>window.location.assign('packagecategory.php')</script>";
        } else {
            $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Inserted!</div>";
            // echo "<script> alert(' Not Inserted Successful..');</script>";
    }
    
    
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
            <h4 class="page-title mb-1 text-primary">Add New Category</h4>
        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Category Name:</label>
                    <div class="col-md-9">
                        <input type="text" name="cname" class="form-control" id="cname" placeholder="Category Name" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-3 form-label">Details:</label>
                    <div class="col-md-9">
                        <textarea id="content" name="content" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-label">Upload Image:</label>
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