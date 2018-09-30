<?php 
	header("Access-Control-Allow-Origin: *");
	header('Content-Type: application/json');

	include '../config.php';
	if (isset($_POST['courseId'])) {
		# code...
		$courseId = $_POST['courseId'];
		$checkStudentsQuery = mysqli_query($con, "SELECT * FROM `courseStudents` WHERE `course_id` = '$courseId'") or die("Unable to Connect, sorry :D");
		if (mysqli_num_rows($checkStudentsQuery) < 1) {
			# code...
			$query = mysqli_query($con, "DELETE FROM `courses` WHERE `id` = '$courseId'") or die("Unable to Connect, sorry :D");
			echo json_encode('1');
		} else {
			# code...
			echo json_encode('2');			
		}
	}
 ?>