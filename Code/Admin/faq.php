<?php
session_start();
$id = $_SESSION['id'];
if (!isset($id))
    echo "<script>window.location.assign('login.php');</script>";

include_once("hhh.php");
include_once("connection.php");

$alert='';

if (isset($_POST["btnsub"])) {
    $que = trim($_POST["que"]);
    $ans = trim($_POST["ans"]);

    $qry = mysqli_query($con, "insert into faq values('','$que','$ans')");
    if ($qry) {
        $alert = "<div class='alert alert-success' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Inserted!</div>";
        echo "<script>window.location.assign('faqview.php')</script>";
    } else {
        $alert = "<div class='alert alert-danger' role='alert'><button type='button' class='btn-close mr-negative-16' data-bs-dismiss='alert' aria-hidden='true'>×</button>Data Not Inserted!</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h4 class="page-title mb-1 text-primary">FAQ</h4>
        </div>
        <div>
            <span id="error"><?php echo $alert; ?></span>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="post">

                <div class="form-group row">
                    <label for="inputName" class="col-md-3 form-label">Question</label>
                    <div class="col-md-9">
                        <textarea name="que" id="que" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-3 form-label">Answer</label>
                    <div class="col-md-9">
                        <textarea name="ans" id="ans" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group mb-0 mt-4 row justify-content-end">
                    <div class="col-md-9">
                        <input type="Submit" class="btn btn-primary" name="btnsub" value="Insert">

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