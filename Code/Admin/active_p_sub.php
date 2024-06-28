<?php
    $con=mysqli_connect("localhost","root","","photography");
    
    $id=$_GET['id'];
    $status=$_GET['status'];

    // $qry=mysqli_query($con,"update packagesub_category set status=0 where sid=$id");
    if($status==1)
    {
        echo "<script> alert('catergory Is Block');</script>";
        echo "<script>window.location.assign('packagesub_categoryview.php');</script>";
        
    }
    else
    {
        $qry=mysqli_query($con,"update packagesub_category set status=0 where sid=$id");
        echo "<script>window.location.assign('packagesub_categoryview.php');</script>";
        echo"Not Active";
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