<?php
session_start();
$id=$_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";
include_once("hhh.php");
include_once("connection.php");

$alert='';

if (isset($_POST['btnsub'])) {

    $title = trim($_POST["title"]);

    $photo = $_FILES["pic"]["name"];
    $dest =  "../Photographer/Images/" . $photo;

    $qry = mysqli_query($con, "insert into gallery values('',$id,'$title','$photo',0)");

    if ($qry) {
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        echo "<script>window.location.assign('gallery.php')</script>";
    } else {
        $alert = "<div class='alert alert-outline-danger' role='alert'><button aria-label='Close' class='btn-close' data-bs-dismiss='alert' type='button'><span aria-hidden='true'>&times;</span></button><strong> Not Upload! </strong></div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>

<body>

    <!-- <div class="main-content side-content pt-0"> -->
    <!-- <div class="main-container container-fluid"> -->
    <!-- <div class="inner-body"> -->


    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">View Photos</h2>

        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <input type="button" class="btn ripple btn-main-primary" data-bs-target="#modaldemo1" data-bs-toggle="modal" value="Add Photos"></button>
            </div>
        </div>
    </div>
    <?php echo $alert; ?>
    
    <form method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="modal" id="modaldemo1">
            <div class="modal-dialog wd-xl-400" role="document">
                <div class="modal-content">
                    <div class="modal-body pd-20 pd-sm-40">
                        <button aria-label="Close" class="close pos-absolute t-15 r-20 tx-26" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title mb-4 text-center">Upload Photo</h5>
                        <div class="form-group">
                            <input class="form-control" name="title" id="title" placeholder="Title" type="text">
                        </div>
                        <div class="form-group">
                            <input type="file" class="dropify" accept=".jpg,.png,.webp,.jpeg" name="pic" id="pic" data-default-file="" data-height="110">
                        </div>
                        <div class="form-group mg-b-25">
                            <!-- <label class="ckbox mg-b-5"><input type="checkbox"> <span class="tx-13">I agree to <a href="javascript:void(0);">Terms</a> and <a href="javascript:void(0);">Privacy Policy</a></span></label> -->
                        </div>
                        <input type="submit" name="btnsub" class="btn ripple btn-primary btn-block" value="Upload">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body ">
                    
                    <div class="table-responsive pt-3">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-center ">
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>See the Home Page</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $qry=mysqli_query($con,"select * from gallery where pid=$id");
                                    for ($i = 1; $i <= mysqli_num_rows($qry); $i++) {
                                    while($row=mysqli_fetch_array($qry))
                                    {

                                ?>
                                <tr>
                                <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo "<image src='../Photographer/Images/$row[image]' height=50 width=50>" ?></td>
                                    <td><?php 
                                            $status=$row['status'];
                                            if($status==0)
                                            {
                                               ?> <a href="active.php?x=<?php echo $row['gid'];?>" class="btn ripple btn-danger btn-rounded"><i class="fe fe-right"></i> Dective</a>
                                            <?php } else { ?><a href="deactive.php?x=<?php echo $row['gid'];?>" class="btn ripple btn-success btn-rounded"><i class="fe fe-right"></i> Active</a>
                                                <?php } ?>
                                    </td>                                                                             
                                    <td><a href="edit_image.php?x=<?php echo $row['gid'];?>" class="btn ripple btn-outline-primary btn-rounded" onclick="javascript: return confirm('Do Edit?')"><i class="fe fe-edit"></i> Edit</a> 
                                    <a href="delete_image.php?x=<?php echo $row['gid'];?>" class="btn ripple btn-outline-danger btn-rounded" onclick="javascript: return confirm('Do Delete?')"><i class="fe fe-delete"></i> Delete</a></td>
                                    
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <?php include_once("fff.php"); ?>

    <!-- INTERNAL DATA TABLE JS -->
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="assets/js/table-data.js"></script>
    <script src="assets/js/select2.js"></script>




    <!-- SCRIPTS -->


    <!-- JQUERY-UI JS -->
    <!-- <script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script> -->

    <!-- INTERNAL DATERANGEPICKER JS -->
    <!-- <script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script> -->
    <!-- <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> -->

    <!-- INTERNAL FILEUPLOADERS JS -->
    <script src="assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="assets/plugins/fileuploads/js/file-upload.js"></script>

    <!-- INTERNALFANCY UPLOADER JS -->
    <!-- <script src="assets/plugins/fancyuploder/jquery.ui.widget.js"></script> -->
    <!-- <script src="assets/plugins/fancyuploder/jquery.fileupload.js"></script> -->
    <!-- <script src="assets/plugins/fancyuploder/jquery.iframe-transport.js"></script> -->
    <!-- <script src="assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script> -->
    <!-- <script src="assets/plugins/fancyuploder/fancy-uploader.js"></script> -->

    <!-- INTERNAL FORM-ELEMENTS JS -->
    <!-- <script src="assets/js/advanced-form-elements.js"></script> -->

    <!-- INTERNAL TELEPHONEINPUT JS -->
    <!-- <script src="assets/plugins/telephoneinput/telephoneinput.js"></script> -->
    <!-- <script src="assets/plugins/telephoneinput/inttelephoneinput.js"></script> -->






</body>

</html>