<?php

$conn = mysqli_connect("localhost", "root", "", "pdf");

 if(isset($_POST['done'])){

	$first_name = $_GET['id'];
	$first_Name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$address = $_POST['address'];
	$phonenumber = $_POST['phonenumber'];
	$email = $_POST['email'];

	$q = " Update bbm set first_name='$first_Name',last_name='$last_name', address='$address',phonenumber='$phonenumber', email='$email' WHERE first_name = '$first_name' ";

	mysqli_query($conn, $q);
	mysqli_close($conn);
	header('location:packagedisplay.php');

 }

?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Update Operation </h1>
 </div><br>

 <label> First Name: </label>
 <input type="text" name="first_name" class="form-control"> 

 <label> Last Name </label>
 <input type="text" name="last_name" class="form-control">

  <label> Address </label>
 <input type="text" name="gender" class="form-control">

 <label> Phonenumber </label>
 <input type="text" name="address" class="form-control">

  <label> Email </label>
 <input type="text" name="email" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>