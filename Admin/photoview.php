<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
include_once("connection.php");

$id = $_GET['id'];
$qry = mysqli_query($con, "select * from gallery where pid=$id");
?>
<!-- INTERNAL Gallery css -->
<link href="assets/plugins/gallery/gallery.css" rel="stylesheet">





<!--/app header-->
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary">Gallery</h4>
    </div>
</div>
<!--End Page header-->

<!-- Row -->
<div class="demo-gallery card">
    <div class="card-header">
        <div class="card-title">Photo </div>
    </div>

    <div class="card-body">

        <ul id="lightgallery" class="list-unstyled row">
            <?php
            

                    while (($row = mysqli_fetch_array($qry))) {
                        if ($qry) {


                    ?>
                    <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="<?php echo "../Photographer/Images/$row[image]"; ?>" data-src="<?php echo "../Photographer/Images/$row[image]"; ?>" data-sub-html="<h4><?php echo "$row[title]"; ?></h4>">
                        <a href="<?php echo "../Photographer/Images/$row[image]"; ?>">
                            <img class="img-responsive br-7" src="<?php echo "../Photographer/Images/$row[image]"; ?>" alt="Thumb-1">
                        </a>
                    </li>
                <?php  } else { 
                    echo"<script> Alert ('No Image'); </script>"; } }  ?>

                          
        </ul>

    </div>

</div>

</div>
</div>

</div>
<?php
include_once("fff.php");
?>
<!-- INTERNAL Gallery js -->
<script src="assets/plugins/gallery/picturefill.js"></script>
<script src="assets/plugins/gallery/lightgallery.js"></script>
<script src="assets/plugins/gallery/lg-pager.js"></script>
<script src="assets/plugins/gallery/lg-autoplay.js"></script>
<script src="assets/plugins/gallery/lg-fullscreen.js"></script>
<script src="assets/plugins/gallery/lg-zoom.js"></script>
<script src="assets/plugins/gallery/lg-hash.js"></script>
<script src="assets/plugins/gallery/lg-share.js"></script>
<script src="assets/js/gallery.js"></script>

</body>

<!-- Mirrored from php.spruko.com/azea/azea/vertical/gallery.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 17:01:28 GMT -->

</html>