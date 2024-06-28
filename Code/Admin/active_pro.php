<?php
    $con=mysqli_connect("localhost","root","","photography");
    
    $id=$_GET['id'];
    $status=$_GET['status'];

    // $qry=mysqli_query($con,"update product_master set status=0 where pid=$id");
    if($status==1)
    {
        echo "<script> alert('catergory Is Block');</script>";
        echo "<script>window.location.assign('product_view.php');</script>";
    }
    else
    {
        mysqli_query($con,"update product_master set status=0 where pid=$id");
        echo "<script>window.location.assign('product_view.php');</script>";
        // echo"Active";
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
    
</body>
</html>