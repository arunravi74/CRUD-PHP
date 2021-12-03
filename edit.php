<?php
$conn = new mysqli('localhost','root','','basic') or die(mysqli_error($conn));
if(isset($_GET['id']) && !empty($_GET['id'])){
	
	$id = $_GET["id"];
	$sql = "SELECT * FROM basic where id=$id";
	$result = $conn->query($sql);
	$userDetails = $result->fetch_assoc();	
}
if(isset($_POST) && !empty($_POST) && !empty($_POST['email']) && !empty($_POST['userid'])){
	//echo "<pre>";print_r($_POST);die;
	$email = ($_POST["email"]);
	$userId = ($_POST["userid"]);
  	//$password = ($_POST["password"]);
  	$address = $_POST['address'];

	$sql =  "UPDATE basic SET email='$email',address='$address' where id=$userId";
	//echo $sql;die;
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
	<title>Update</title>
</head>
<body>

	<form action="" method="POST" name="editForm" id="editForm">
		<input type="hidden" name="userid" id="userid" value="<?= $id ?>">
		<div>
		<input type="text" name="email" placeholder="Enter you Email ID" value="<?= $userDetails['email']; ?>">
		</div>
		<div>
		<input type="password" name="password" placeholder="Enter your password" value="<?= $userDetails['password'];?>" disabled>
		</div>
		<div>
		<input type="text" name="address" placeholder="Enter your address" value="<?= $userDetails['address'];?>">
		</div>
		<div>
		<button type="submit" name ="update">Update</button>
		</div>

	</form>

</body>
</html>