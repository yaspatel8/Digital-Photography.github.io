<?php
    include("connection.php");
    
    $id=$_GET['status'];

    $qry=mysqli_query($con,"update photographer set status=0 where id=$id");
    if($qry)
    {
        header('location:photoreq.php');
    }
    else
    {
        echo "<td><label class='badge badge-danger' style='cursor:pointer;'>Pending</label></td>";
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