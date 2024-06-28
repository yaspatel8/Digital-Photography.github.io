<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
include_once("connection.php");

$alert = '';

if (isset($_POST["btnsub"])) {
    $cid = trim($_POST["cid"]);
    $name = trim($_POST["pname"]);
    $detail = trim($_POST["pdetail"]);
    $price = trim($_POST["price"]);
    $qty = trim($_POST["qty"]);

    $photo = trim($_FILES["pic"]["name"]);
    $dest = "../product_image/" . $photo;

    $qry = mysqli_query($con, "insert into product_master values('','$cid','$name','$detail','$price','$qty','$photo',0,now())");

    if ($qry) {
        move_uploaded_file($_FILES['pic']['tmp_name'], $dest);
        // echo "<script> alert('Inserted Successful..');</script>";
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Product Inserted!</div>";
        echo "<script>window.location.assign('product_view.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Product Not Inserted!</div>";
        // echo "<script> alert(' Not Inserted Successful..');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function getXMLHTTP() {
            var xmlhttp = false;
            xmlhttp = new XMLHttpRequest();
            return xmlhttp;
        }

        function getState(cid) {

            var strURL = "find_product.php?cid=" + cid;

            var req = getXMLHTTP();
            if (req) {
                req.onreadystatechange = function() {
                    if (req.readyState == 4 && req.status == 200) {
                        document.getElementById('sid').innerHTML = req.responseText;
                    }
                }
                req.open("GET", strURL, true);
                req.send();
            }
        }
    </script>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h4 class="page-title mb-1 text-primary">Add Product</h4>
        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Select Category</label>
                    <div class="col-md-9">
                        <select name="cid" id="cid" class="form-select border border-2 shadow bg-white text-dark " onchange="getState(this.value)" required>
                            <option value="" selected disabled>Select Category</option>
                            <?php
                            $qry = mysqli_query($con, "select * from catrgory_master");
                            if ($qry) {
                                while ($row = mysqli_fetch_array($qry)) {
                                    echo "<option value=$row[0]>$row[1]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Product Name</label>
                    <div class="col-md-9">
                        <input type="text" name="pname" class="form-control" id="pname" placeholder="Product Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-3 form-label">Detail</label>
                    <div class="col-md-9">
                        <textarea name="pdetail" id="pdetail" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Price</label>
                    <div class="col-md-9">
                        <input type="text" name="price" class="form-control" id="price" placeholder="Product Price" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Quantity</label>
                    <div class="col-md-9">
                        <input type="text" name="qty" class="form-control" id="qty" placeholder="Product Quantity" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-label">Upload Image</label>
                    <div class="col-md-9">
                        <input type="file" name="pic" id="image" accept=".jpg,.png,.webp,.jpeg" required class="form-control" required>
                    </div>
                </div>
                <div class="form-group mb-0 mt-4 row justify-content-end">
                    <div class="col-md-9">
                        <input type="Submit" class="btn btn-primary" name="btnsub" value="Insert">
                        <input type="reset" class="btn btn-secondary" value="Reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

</body>

</html>
<?php
include("fff.php");
?>