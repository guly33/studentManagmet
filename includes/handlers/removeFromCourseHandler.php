<?php 
	header("Access-Control-Allow-Origin: *");
	header('Content-Type: application/json');

	include '../config.php';
	if (isset($_POST['courseName']) && isset($_POST['studentId'])) {
		# code...
		$studentId = $_POST['studentId']; 
		$courseName = $_POST['courseName']; 
		$courseIdQuery = mysqli_query($con, "SELECT `id` FROM `courses` WHERE `name` = '$courseName'") or die("Unable to Connect, sorry :D");

		while ($row = mysqli_fetch_array($courseIdQuery)) 
		{
		    $courseId = $row['id'];  
		}

		$query = mysqli_query($con, "DELETE FROM `courseStudents` WHERE `course_id` = '$courseId' AND `student_id` = '$studentId'") or die("Unable to Connect, sorry :D");

		$studentQuery = mysqli_query($con, "SELECT * FROM `courseStudents` WHERE `student_id` = '$studentId'") or die("Unable to Connect, sorry :D");
		if (mysqli_num_rows($studentQuery) < 1) {
			# code...
			$deleteStudentQuery = mysqli_query($con, "DELETE FROM `students` WHERE `id` = '$studentId'");
			$deleted = '2';
		} else {
			$deleted = '1';
		}
		echo json_encode($deleted);
		
	}

 ?>