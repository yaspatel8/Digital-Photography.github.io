<?php
session_start();
include_once("hhh.php");
include_once("connection.php");

$id = $_SESSION['id'];
echo "$id";
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">File export Datatables</h6>
                        <p class="text-muted card-sub-title">Exporting data from a table can often be a key part of a complex application. The Buttons extension for DataTables provides three plug-ins that provide overlapping functionality for data export:</p>
                    </div>
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                            <thead>
                                <tr>

                                    <th>Package Name</th>
                                    <th>Sub Package Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Amount</th>
                                    <th>Date To</th>
                                    <th>Date From</th>
                                    <th>Status</th>
                                    <th>Order ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $id = $_SESSION['id'];
                                $qry = mysqli_query($con, "select b.*,p.*,ps.* from booking_master b,packagecategory_master p,packagesub_category ps where p.cid=ps.cid and b.sid=ps.sid and b.pid=$id");
                                while ($row = mysqli_fetch_array($qry)) {


                                ?>

                                    <tr>

                                        <td><?php echo "$row[cname]" ?></td>
                                        <td><?php echo "$row[sname]" ?></td>
                                        <td><?php echo "$row[fname]" ?></td>
                                        <td><?php echo "$row[lname]" ?></td>
                                        <td><?php echo "$row[email]" ?></td>
                                        <td><?php echo "$row[mobile]" ?></td>
                                        <td><?php echo "$row[address]" ?></td>
                                        <td><?php echo "$row[amt]" ?></td>
                                        <td><?php echo "$row[date_to]" ?></td>
                                        <td><?php echo "$row[date_from]" ?></td>
                                        
                                            <?php $status=$row['status'];
                                                if ($status == 1) {
                                                    echo "<td>"; ?><span class='badge bg-success-light border-success fs-11' title='Order Compaleted' style="cursor: pointer;">Compalate</span></a>
                                                    <?php "</td>";
                                                    } else {
                                                    echo "<td>"; ?><a href="order1.php?status=<?php echo $row['bid']; ?>" onclick="javascript: return confirm('Do you Accept Order?')"><span class='badge bg-danger-light border-danger fs-11' title='Accept Order?' style="cursor: pointer;"> Pending</span></a>
                                                    <?php "</td>";
                                                    }
                                            ?>

                                        
                                        <td><?php echo "$row[order_id]" ?></td>
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
    <!-- End Row -->



    <?php
    include_once("fff.php");
    ?>
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
</body>

</html>