<?php
session_start();
$id=$_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";
include_once("hhh.php");
include_once("connection.php");

$vid=$_GET['x'];

$qry1 = mysqli_query($con, "select * from video where vid=$vid");

                while ($row1 = mysqli_fetch_array($qry1)) {

$alert='';

if (isset($_POST['btnsub'])) {
    if ($_FILES['pic']['name'] != "") {
        $photo = $_FILES['pic']['name'];
        $dest = "../Photographer/video/" . $photo;
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
    } else {
        $photo = $_POST['oldimage'];
    }
    

    $title = trim($_POST["title"]);

    $qry = mysqli_query($con, "update video set title='$title',video='$photo' where vid='$vid'");

    if ($qry) {
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        echo "<script>window.location.assign('video.php')</script>";
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
    <title>Upload video</title>
    <script src="jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn").click();
        });
    </script>
</head>

<body>

    <!-- <div class="main-content side-content pt-0"> -->
    <!-- <div class="main-container container-fluid"> -->
    <!-- <div class="inner-body"> -->


    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">View Videos</h2>

        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <input type="button" class="btn ripple btn-main-primary" data-bs-target="#modaldemo1" data-bs-toggle="modal" id="btn" value="Add Videos"></button>
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
                        <h5 class="modal-title mb-4 text-center">Upload Video</h5>
                        <div class="form-group">
                            <input class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $row1['title']; ?>" type="text">
                        </div>
                        <div class="form-group">
                            <label>Old Image:</label>
                        <video src="../Photographer/video/<?php echo $row1['video']; ?>" style="height: 100px;" autoplay muted controls></video><br><br>
                                <input type="hidden" name="oldimage" value="<?php echo $row1['video']; ?>">
                                
                        </div>
                
                        <div class="form-group">
                            <input type="file" class="dropify" accept=".mp4" name="pic" id="pic" data-default-file="" data-height="110">
                        </div>
                        <div class="form-group mg-b-25">
                            <!-- <label class="ckbox mg-b-5"><input type="checkbox"> <span class="tx-13">I agree to <a href="javascript:void(0);">Terms</a> and <a href="javascript:void(0);">Privacy Policy</a></span></label> -->
                        </div>
                        
                        <input type="submit" name="btnsub" class="btn ripple btn-primary btn-block" value="Update">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    
                    <div class="table-responsive pt-3">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $qry=mysqli_query($con,"select * from video");
                                    while($row=mysqli_fetch_array($qry))
                                    {

                                ?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><video src="<?php echo"../Photographer/video/$row[video]" ?>" controls muted autoplay height="110" width="250"></video></td>                                    
                                    <td><a href="edit_video.php?x=<?php echo $row['vid'];?>" class="btn ripple btn-outline-primary btn-rounded" onclick="javascript: return confirm('Do Edit?')"><i class="fe fe-edit"></i> Edit</a> 
                                    <a href="delete_video.php?x=<?php echo $row['vid'];?>" class="btn ripple btn-outline-danger btn-rounded" onclick="javascript: return confirm('Do Delete?')"><i class="fe fe-delete"></i> Delete</a></td>
                                    
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