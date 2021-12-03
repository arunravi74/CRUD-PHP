<?php
$conn = new mysqli('localhost','root','','basic') or die(mysqli_error($conn));
if($_SERVER["REQUEST_METHOD"]=="GET") {
	$sql = "SELECT * FROM basic";
	$result = $conn->query($sql);
$userList=[];
if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    $userList[] = $row;
  }
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
	<?php 

//echo "<pre>";print_r($userList);die;?>
	<a href="add.php">Add User</a>
	<table>
		<thead>
			<th>S.NO</th>
			<th>Name</th>
			<th>Address</th>
			<th>Action</th>
		<tbody>
		</thead><?php
			if (!empty($userList)){
				foreach ($userList as $key => $value) { ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= $value['email'] ?></td>
						<td><?= $value['address'] ?></td>
						<td><a href="edit.php?id=<?= $value['id']?>">Edit</a> <a href="delete.php?id=<?= $value['id']?>">Delete</a></td>
					</tr> <?php
			 	}
			}else{ ?>
				<tr>No record Found</tr><?php
			} ?>
		</tbody>
	</table>		
</body>
</html>
