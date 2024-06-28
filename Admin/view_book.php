<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("connection.php");
include_once("hhh.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="page-leftheader">
                        <h5 class="page-title mb-0 text-primary">User Book Package</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">

                                <thead>
                                    <tr>

                                    <th class="border-bottom-0"><b>No</b></th>
                                        <th class="border-bottom-0"><b>Package Name</b></th>
                                        <th class="border-bottom-0"><b>Sub Package Name</b></th>
                                        <th class="border-bottom-0"><b>Photographer Name</b></th>
                                        <th class="border-bottom-0"><b>First Name</b></th>
                                        <th class="border-bottom-0"><b>Last Name</b></th>
                                        <th class="border-bottom-0"><b>Email</b></th>
                                        <th class="border-bottom-0"><b>Phone No.</b></th>
                                        <th class="border-bottom-0"><b>Address</b></th>
                                        <th class="border-bottom-0"><b>Amount</b></th>
                                        <th class="border-bottom-0"><b>Date To</b></th>
                                        <th class="border-bottom-0"><b>Date From</b></th>
                                        <th class="border-bottom-0"><b>Status</b></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $qry = mysqli_query($con, "select b.*,p.*,ps.*,pg.* from booking_master b,packagecategory_master p,packagesub_category ps,photographer pg where p.cid=ps.cid and b.sid=ps.sid and b.pid=pg.id");
                                    for ($i = 1; $i <= mysqli_num_rows($qry); $i++) {
                                    while ($row = mysqli_fetch_array($qry)) {


                                    ?>

                                        <tr class="text text-center">
                                            
                                        <td><?php echo $i++; ?></td>
                                            <td><?php echo "$row[cname]" ?></td>
                                            <td><?php echo "$row[sname]" ?></td>
                                            <td><?php echo "$row[name]" ?></td>
                                            <td><?php echo "$row[fname]" ?></td>
                                            <td><?php echo "$row[lname]" ?></td>
                                            <td><?php echo "$row[6]" ?></td>
                                            <td><?php echo "$row[mobile]" ?></td>
                                            <td><?php echo "$row[address]" ?></td>
                                            <td><?php echo "$row[amt]" ?></td>
                                            <td><?php echo "$row[date_to]" ?></td>
                                            <td><?php echo "$row[date_from]" ?></td>
                                            <?php
                                            $status = $row['12'];
                                            if ($status == 1) {
                                                echo "<td>"; ?><span class='badge bg-success-light border-success fs-11'>Compaleted</span>  
                                                <?php "</td>";
                                                } else {
                                                echo "<td>"; ?><span class='badge bg-danger-light border-danger fs-11'> Not Compalate</span>
                                                <?php "</td>";
                                                }
                                            ?>
                                            
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