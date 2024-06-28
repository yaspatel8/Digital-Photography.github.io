<?php
    $con=mysqli_connect("localhost","root","","photography");
    
    $id=$_GET['id'];

    $qry=mysqli_query($con,"update catrgory_master set status=0 where cid=$id");
    if($qry)
    {
        header('location:category.php');
    }
    else
    {
        echo"Active";
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