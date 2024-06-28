<?php
include("connection.php");
include("hhh.php");

if (isset($_POST["btnsub"])) {
    $title = trim($_POST["topic"]);
    $des = trim($_POST["detail"]);

    $qry = mysqli_query($con, "insert into terms values('','$title','$des')");
    if ($qry) {
        echo "<script> alert('Inserted Successful..');</script>";
    } else {
        echo "<script> alert('!!!Not Inserted..');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms And Conditions</title>
    <script src="../Ckeditor1/ckeditor.js"></script>
</head>

<body>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">Terms & Conditions</h4>
        </div>

        <div class="page-rightheader">
            <div class="btn-list">
                <div class="card" id="modal">
                    <button class="btn btn-primary me-7" data-bs-target="#modaldemo1" data-bs-toggle="modal">Add New Terms & Conditions
                </div>
            </div>
        </div>
        <div class="modal fade" id="modaldemo1">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add New Terms & Conditions</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" autocomplete="off">
                            <label>Enter Topic</label>
                            <input type="text" class="form-control" name="topic" id="topic" required><br>
                            <label>Enter Descripition</label>
                            <textarea name="detail" id="detail" class="form-control" required></textarea>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Insert" name="btnsub">
                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <!--End Page header-->

    <!-- Row -->
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