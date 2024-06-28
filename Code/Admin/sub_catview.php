<?php
include("connection.php");
include("hhh.php");

if (isset($_POST['btn'])) { 
    echo "<script>window.location.assign('sub_cat.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sub Category</title>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="page-leftheader">
                        <h5 class="page-title mb-0 text-primary">Add Sub Category</h5>
                    </div>
                    <form method="post">
                    <div class="btn-list">
                        <div class="card" id="modal">
                            <button class="btn btn-primary" name="btn" style="margin-left: 100vh; margin-top:1vh;">Add Sub Catorgy</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">

                                <thead>
                                    <tr>

                                        <th class="border-bottom-0"><b>No</b></th>
                                        <th class="border-bottom-0"><b>Photo</b></th>
                                        <th class="border-bottom-0"><b>Catorgy Name</b></th>
                                        <th class="border-bottom-0"><b>Sub Catorgy Name</b></th>
                                        <th class="border-bottom-0"><b>Date</b></th>
                                        <th class="border-bottom-0"><b>Status</b></th>
                                        <th class="border-bottom-0"><b>Action</b></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qry = mysqli_query($con, "select * from sub_category inner join catrgory_master on sub_category.cid=catrgory_master.cid");
                                    while ($row = mysqli_fetch_array($qry)) {


                                    ?>

                                        <tr class="text text-center">
                                            <td><?php echo "$row[sid]" ?></td>
                                            <td><?php echo "<image src='../product_image/$row[sphoto]' height=60px>" ?></td>
                                            <td><?php echo "$row[cname]" ?></td>
                                            <td><?php echo "$row[sname]" ?></td>
                                            <td><?php echo "$row[sdate]" ?></td>
                                            <td><?php echo "$row[status]" ?></td>
                                            <td class="fs-14"><a href="update_subcat.php?x=<?php echo $row['sid'];?>" class="btn btn-pill btn-primary" onclick="javascript: return confirm('Do Edit?')">Edit</a>      
                                            <a href="delete_subcat.php?x=<?php echo $row['sid'];?>" class="btn btn-pill btn-danger" onclick="javascript: return confirm('Do Delete?')">Delete</a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

    </div>
    </div>

    </div>

    <?php
    include("fff.php");
    ?>
    <!--Footer-->
    <!-- End Footer-->
    </div>

    <!-- End Page -->
    <!-- Back to top -->
    <!-- INTERNAL Data tables -->
    <script src="assets/plugins/datatables/DataTables/js/jquery.dataTables.js"></script>
    <script src="assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/JSZip/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/Buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/js/datatables.js"></script>



</body>

</html>