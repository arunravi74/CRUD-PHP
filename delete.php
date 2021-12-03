<?php
$conn = new mysqli('localhost','root','','basic') or die(mysqli_error($conn));
if(isset($_GET['id']) && !empty($_GET['id'])){
	
	$id = $_GET["id"];
	$sql = "DELETE FROM basic where id=$id";
	$result = $conn->query($sql);
	header("Location:index.php");	
}?>