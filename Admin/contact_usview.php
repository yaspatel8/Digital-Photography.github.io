<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("connection.php");
include_once("hhh.php");

if (isset($_POST['btn'])) { 
    echo "<script>window.location.assign('contact_us.php')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us page</title>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="page-leftheader">
                        <h5 class="page-title mb-0 text-primary">Contact Us</h5>
                    </div>
                    <form method="post">
                    <div class="btn-list">
                        <div class="card" id="modal">
                            <button class="btn btn-primary" name="btn" style="margin-left: 100vh; margin-top:1vh;">Add New Contact</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                
                                <thead>
                                    <tr >

                                        <th class="border-bottom-0"><b>Address</b></th>
                                        <th class="border-bottom-0"><b>Phone</b></th>
                                        <th class="border-bottom-0"><b>Email</b></th>
                                        <th class="border-bottom-0"><b>FB Url</b></th>
                                        <th class="border-bottom-0"><b>Instagram Url</b></th>
                                        <th class="border-bottom-0"><b>X Url</b></th>
                                        <th class="border-bottom-0"><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qry = mysqli_query($con, "select * from contact_us");
                                    while ($row = mysqli_fetch_array($qry)) {


                                    ?>

                                        <tr class="text text-center">
                                            
                                            <td><?php echo "$row[address]" ?></td>
                                            <td><?php echo "$row[phone]" ?></td>
                                            <td><?php echo "$row[email]" ?></td>
                                            <td><?php echo "$row[fburl]" ?></td>
                                            <td><?php echo "$row[instaurl]" ?></td>
                                            <td><?php echo "$row[xurl]" ?></td>
                                            <td class="fs-14"><a href="update_contact.php?x=<?php echo $row['id'];?>" class="btn btn-pill btn-primary">Edit</a>   
                                            <a href="delete_contact.php?x=<?php echo $row['id'];?>" class="btn btn-pill btn-danger" onclick="javascript: return confirm('Do Delete?')">Delete</a></td>
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