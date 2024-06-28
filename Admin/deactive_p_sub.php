<?php
    $con=mysqli_connect("localhost","root","","photography");
    
    $id=$_GET['id'];

    $qry=mysqli_query($con,"update packagesub_category set status=1 where sid=$id");
    if($qry)
    {
        header('location:packagesub_categoryview.php');
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