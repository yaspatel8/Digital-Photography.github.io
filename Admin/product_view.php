<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("connection.php");
include_once("hhh.php");

if (isset($_POST['btn'])) { 
    echo "<script>window.location.assign('product.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="page-leftheader">
                        <h5 class="page-title mb-0 text-primary">Add Product</h5>
                    </div>
                    <form method="post">
                    <div class="btn-list">
                        <div class="card" id="modal">
                            <button class="btn btn-primary" name="btn" style="margin-left: 100vh; margin-top:1vh;">Add Product</button>
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
                                        <th class="border-bottom-0"><b>Product Name</b></th>
                                        <th class="border-bottom-0"><b>Detail</b></th>
                                        <th class="border-bottom-0"><b>Price</b></th>
                                        <th class="border-bottom-0"><b>Quentity</b></th>
                                        <th class="border-bottom-0"><b>Status</b></th>
                                        <th class="border-bottom-0"><b>Date</b></th>
                                        <th class="border-bottom-0"><b>Action</b></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qry = mysqli_query($con, "select * from product_master inner join catrgory_master on product_master.cid=catrgory_master.cid");
                                    
                                    for ($i = 1; $i <= mysqli_num_rows($qry); $i++) {
                                    while ($row = mysqli_fetch_array($qry)) {


                                    ?>

                                        <tr class="text text-center">
                                        <td><?php echo $i++; ?></td>
                                            <td><?php echo "<image src='../product_image/$row[6]' height=50 width=50>" ?></td>
                                            <td><?php echo "$row[cname]" ?></td>
                                            <td><?php echo "$row[pname]" ?></td>
                                            <td><?php echo "$row[description]" ?></td>
                                            <td><?php echo "$row[price]" ?></td>
                                            <td><?php echo "$row[qty]" ?></td>
                                           <?php $status = $row[7];
                                            if ($status == 0) {
                                                echo "<td>"; ?><a href="deactive_pro.php?id=<?php echo $row['pid']; ?>"><span class='btn btn-pill btn-success' style="cursor: pointer;">Active</span></a>
                                                <?php "</td>";
                                                } else {
                                                echo "<td>"; ?><a href="active_pro.php?id=<?php echo $row['pid']; ?>&status=<?php echo $row['status']; ?>"><span class='btn btn-pill btn-danger' style="cursor: pointer;"> Deactive</span></a>
                                                <?php "</td>";
                                                }
                                            ?>
                                            <td><?php echo "$row[order_date]" ?></td>
                                            <td class="fs-14"><a href="update_product.php?x=<?php echo $row['pid'];?>" class="btn btn-pill btn-primary" onclick="javascript: return confirm('Do Edit?')"> Edit</a>   
                                            <a href="delete_product.php?x=<?php echo $row['pid'];?>" class="btn btn-pill btn-danger" onclick="javascript: return confirm('Do Delete?')"> Delete</a></td>
                                        </tr>

                                    <?php
                                    } }
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