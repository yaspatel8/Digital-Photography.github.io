<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
include_once("connection.php");

$id = $_GET['id'];
$qry = mysqli_query($con, "select * from video where pid=$id");
?>
<!-- INTERNAL Gallery css -->






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
        <div class="card-title">Video </div>
    </div>

    <div class="card-body">

        <ul id="lightgallery" class="list-unstyled row">
            <?php
            

                    while (($row = mysqli_fetch_array($qry))) {
                        if ($qry) {


                    ?>
                    <li class=" col-sm-4 ">
                        <video src="<?php echo "../Photographer/video/$row[video]"; ?>" controls autoplay muted width="345" alt=""></video>
                        
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


</body>

<!-- Mirrored from php.spruko.com/azea/azea/vertical/gallery.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 17:01:28 GMT -->

</html>