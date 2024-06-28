<?php
include("connection.php");
include("hhh.php");

$id = $_GET['x'];
$qry = mysqli_query($con, "select * from terms where id=$id");

$row = mysqli_fetch_array($qry);

if (isset($_POST["btnsub"])) {
    $title = trim($_POST["topic"]);
    $des = trim($_POST["detail"]);

    $qry = mysqli_query($con, "update terms set title='$title',des='$des' where id='$id'");
    if ($qry) {
        echo "<script> alert('Edited Successful..');</script>";
        echo "<script>window.location.assign('terms.php')</script>";
    } else {
        echo "<script> alert('!!!Not Edited..');</script>";
    }
}
if(isset($_POST["btnclose"]))
{
    echo "<script>window.location.assign('terms.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms And Conditions</title>
    <script src="../Ckeditor1/ckeditor.js"></script>
    <script src="jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn").click();
        });
    </script>
</head>

<body>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">Terms & Conditions</h4>
        </div>

        <div class="page-rightheader">
            <div class="btn-list">
                <div class="card" id="modal">
                    <button class="btn btn-primary me-7" data-bs-target="#modaldemo1" id="btn"  data-bs-toggle="modal">Add New Terms & Conditions
                </div>
            </div>
        </div>
        <div class="modal fade" id="modaldemo1">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Update Terms & Conditions</h6>
                    </div>
                    <div class="modal-body">
                        <form method="post" autocomplete="off">
                            <label>Enter Topic</label>
                            <input type="text" class="form-control" name="topic" id="topic" value="<?php echo $row['title']; ?>" required><br>
                            <label>Enter Descripition</label>
                            <textarea name="detail" id="detail" class="form-control" required><?php echo $row['des']; ?></textarea>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Edit" name="btnsub">
                                <input  type="submit" class="btn btn-secondary"  value="Close" name="btnclose">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <?php
                    $qry = mysqli_query($con, "select * from terms");
                    while ($row = mysqli_fetch_array($qry)) {


                    ?>
                    
    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                        <h4 class="card-title"><?php echo "$row[title]" ?></h4>
                        <a href="termsUpdate.php?x=<?php echo $row['id']; ?>" class="btn btn-pill btn-primary" style="margin-left: 90vh;" onclick="javascript: return confirm('Do Edit?')">Edit</a>
                       <a href="termsDelete.php?x=<?php echo $row['id']; ?>" class="btn btn-pill btn-danger" style="margin-left: 2vh;" onclick="javascript: return confirm('Do Delete?')">Delete</a>
                </div>
                <div class="card-body">

                    <p><?php echo "$row[des]" ?></p>
                </div>
            </div>
        </div>
    

    </div>
    <?php } ?>
    <!-- End Row -->
</body>

</html>
<?php
include("fff.php");
?>