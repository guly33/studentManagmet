<?php 
	header("Access-Control-Allow-Origin: *");
	header('Content-Type: application/json');

	include '../config.php';
	if (isset($_POST['studentId'])) {
		# code...
		$studentId = $_POST['studentId']; 

		$query = mysqli_query($con, "DELETE FROM `courseStudents` WHERE `student_id` = '$studentId'") or die("Unable to Connect, sorry :D");

		$studentQuery = mysqli_query($con, "SELECT * FROM `courseStudents` WHERE `student_id` = '$studentId'") or die("Unable to Connect, sorry :D");

		if (mysqli_num_rows($studentQuery) < 1) {
			# code...
			$deleteStudentQuery = mysqli_query($con, "DELETE FROM `students` WHERE `id` = '$studentId'");
		}
		echo json_encode('1');
		
	}

 ?>