<?php 
	$usersArray = array();

	$usersQuery = mysqli_query($con, "SELECT * FROM users LIMIT 100");

	while ($row = mysqli_fetch_array($usersQuery)) {
	 	# code...
	 	array_push($usersArray, $row);
	 }

	$myJSON = json_encode($usersArray);

 ?>