<?php
include("connection.php");
include("hhh.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer request</title>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="page-leftheader">
                        <h5 class="page-title mb-0 text-primary">Photographer Request</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                
                                <thead>
                                    <tr >

                                        <th class="border-bottom-0"><b>Photo</b></th>
                                        <th class="border-bottom-0"><b>Name</b></th>
                                        <th class="border-bottom-0"><b>Email</b></th>
                                        <th class="border-bottom-0"><b>Phone No.</b></th>
                                        <th class="border-bottom-0"><b>Address</b></th>
                                        <th class="border-bottom-0"><b>Proof_Type</b></th>
                                        <th class="border-bottom-0"><b>Proof_Image</b></th>
                                        <th class="border-bottom-0"><b>Proof_No.</b></th>
                                        <th class="border-bottom-0"><b>Password</b></th>
                                        <th class="border-bottom-0"><b>Date</b></th>
                                        <th class="border-bottom-0"><b>Status</b></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qry = mysqli_query($con, "select * from photographer");
                                    while ($row = mysqli_fetch_array($qry)) {


                                    ?>

                                        <tr class="text text-center">
                                            <td><?php echo "<image src='../Photographer/Images/$row[photo]' height=50 width=50>" ?></td>
                                            <td><?php echo "$row[name]" ?></td>
                                            <td><?php echo "$row[email]" ?></td>
                                            <td><?php echo "$row[phone]" ?></td>
                                            <td><?php echo "$row[address]" ?></td>
                                            <td><?php echo "$row[proof_data]" ?></td>
                                            <td><?php echo "<image src='../Photographer/Images/$row[proof]' height=50 width=50>" ?></td>
                                            <td><?php echo "$row[proof_id]" ?></td>
                                            <td><?php echo "$row[password]" ?></td>
                                            <td><?php echo "$row[datetime]" ?></td>

                                            <?php
                                            $status = $row['status'];
                                            if ($status == 1) {
                                                echo "<td>"; ?><a href="photoupdate0.php?status=<?php echo $row['id']; ?>" onclick="javascript: return confirm('Do you want to Photographer Cancle?')"><span class='badge bg-success-light border-success fs-11' title='Cancle Photographer?' style="cursor: pointer;">Photographer</span></a><?php "</td>";
                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                echo "<td>"; ?><a href="photoupdate1.php?status=<?php echo $row['id']; ?>" onclick="javascript: return confirm('Do you want to Add Photographer?')"><span class='badge bg-danger-light border-danger fs-11' title='Add Photographer?' style="cursor: pointer;"> Add Photographer</span></a><?php "</td>";
                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                ?>

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