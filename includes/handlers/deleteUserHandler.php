<?php 
	header("Access-Control-Allow-Origin: *");
	header('Content-Type: application/json');

	include '../config.php';
	if (isset($_POST['userId'])) {
		# code...
		$userId = $_POST['userId']; 

		$query = mysqli_query($con, "DELETE FROM `users` WHERE `id` = '$userId'") or die("Unable to Connect, sorry :D");

		$userQuery = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$userId'") or die("Unable to Connect, sorry :D");

		if (mysqli_num_rows($userQuery) < 1) {
			# code...
			$deleteUserQuery = mysqli_query($con, "DELETE FROM `users` WHERE `id` = '$userId'");
		}
		echo json_encode('1');
		
	}

 ?>