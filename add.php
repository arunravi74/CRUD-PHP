<?php
$conn = new mysqli('localhost','root','','basic') or die(mysqli_error($conn));
if(isset($_POST) && !empty($_POST)){
	
	$email = ($_POST["email"]);
  	$password = ($_POST["password"]);
  	$address = $_POST['address'];

	$sql =  "INSERT INTO basic(email,password,address)
	VALUES ('$email', '$password', '$address')";

	if (mysqli_query($conn, $sql)) {
	  header("Location:index.php");
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup</title>
</head>
<body>

	<form action="" method="POST">
		<div>
		<input type="text" name="email" placeholder="Enter you Email ID">
		</div>
		<div>
		<input type="password" name="password" placeholder="Enter your password">
		</div>
		<div>
		<input type="text" name="address" placeholder="Enter your address">
		</div>
		<div>
		<button type="submit" name ="save">Save</button>
		</div>

	</form>

</body>
</html>