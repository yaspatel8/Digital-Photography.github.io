<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
include_once("connection.php");

$name  = $detail  = $phono = $alert = '';
if (isset($_POST['btn'])) { 
    echo "<script>window.location.assign('cat1.php')</script>";
}

// if (isset($_POST['btnsub'])) {
    
//     $name = trim($_POST["cname"]);
//     $detail = ($_POST["content"]);
//     $icon = trim($_POST["icon"]);

//     $photo = $_FILES["pic"]["name"];
//     $dest = "../package_image/" . $photo;

//     $qry = mysqli_query($con, "insert into packagecategory_master values('','$name','$photo','$detail','$icon',0,now())");

//     if ($qry) {
//         move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
//         //echo "<script> alert('Inserted Successful..');</script>";
//         $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Inserted!</div>";
//     } else {
//         $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Inserted!</div>";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<style>
    .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 30vh;
        }
    </style>
</head>
    

<body>
    <div class="card">
        <div class="card-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-1 text-primary">Add Category</h4>
            </div>
            <form method="post">
            <div class="btn-list">
                <div class="card" id="modal">
                    <!-- <button class="btn btn-primary" style="margin-left: 100vh; margin-top:1vh;" data-bs-target="#modaldemo1" data-bs-toggle="modal">Add New Category</button> -->
                    <button class="btn btn-primary" name="btn" style="margin-left: 100vh; margin-top:1vh;">Add  Category</button>
                </div>
            </div>
            </form>
            <div class="modal fade" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Add New Category</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" autocomplete="off" enctype="multipart/form-data">
                                <label>Enter Name:</label>
                                <input type="text" class="form-control" name="cname" id="cname" required><br>
                                <label>Enter Details:</label>
                                <textarea id="content" name="content" class="form-control" required></textarea>
                                
                                <div class="form-group">
                                    <label class="image">Upload Image:</label>
                                    <input type="file" name="pic" id="image" required class="form-control" required>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Insert" name="btnsub">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">
            <div class="">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered text-nowrap key-buttons">
                        <center>
                            <thead>

                                <tr>
                                    <th class="border-bottom-3 font-weight-bold fs-16">No.</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Photo</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Name</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Details</th>
                                  
                                    <th class="border-bottom-3 font-weight-bold fs-16">Date & Time</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Status</th>
                                    <th class="border-bottom-3 font-weight-bold fs-16">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = mysqli_query($con, "select * from packagecategory_master");
                                for ($i = 1; $i <= mysqli_num_rows($qry); $i++) {
                                while ($row = mysqli_fetch_array($qry)) {
                                ?>

                                    <tr class="text text-center">
                                    <td><?php echo $i++; ?></td>
                                        
                                        <td><?php echo "<image src='../package_image/$row[photo]' height=50 width=50>" ?></td>
                                        <td class="fs-14"><?php echo $row['cname'] ?></td>
                                        <td class="fs-14"><?php echo $row['detail'] ?></td>
                                       
                                        <td class="fs-14"><?php echo $row['cdate'] ?></td>
                                        <?php
                                            $status = $row['status'];
                                            if ($status == 0) {
                                                echo "<td>"; ?><a href="deactive_p_c.php?id=<?php echo $row['cid']; ?>"><span class='btn btn-pill btn-success' style="cursor: pointer;">Active</span></a>
                                                <?php "</td>";
                                                } else {
                                                echo "<td>"; ?><a href="active_p_c.php?id=<?php echo $row['cid']; ?>"><span class='btn btn-pill btn-danger' style="cursor: pointer;"> Deactive</span></a>
                                                <?php "</td>";
                                                }
                                            ?>
                                        <td class="fs-14"><a href="update_packagecategory.php?x=<?php echo $row['cid'];?>" class="btn btn-pill btn-primary" onclick="javascript: return confirm('Do Edit?')">Edit</a> | 
                                        <a href="delete_packagecategory.php?x=<?php echo $row[0];?>" class="btn btn-pill btn-danger" onclick="javascript: return confirm('Do Delete?')">Delete</a>

                                        </td>
                                    </tr>
                                <?php
                                } }
                                ?>
                            </tbody>
                        </center>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once("fff.php");
    ?>
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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder:
            {
                uploadUrl: 'fileupload.php'
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>