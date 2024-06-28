<?php 
    session_start();
    session_destroy();
    echo "<script>alert('Log Out..');</script>";
    echo "<script>window.location.assign('login.php');</script>";
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