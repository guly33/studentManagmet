<?php 
	
	$coursesArray = array();

	$coursesQuery = mysqli_query($con, "SELECT * FROM courses LIMIT 100");

	while ($row = mysqli_fetch_array($coursesQuery)) {
	 	# code...
	 	$studentsArray = array();
	 	$course_id = $row['id'];
	 	$studentsInCourseQuery = mysqli_query($con, "SELECT * FROM courseStudents WHERE course_id = '$course_id'");
	 	while ($courseRow = mysqli_fetch_array($studentsInCourseQuery)) {
	 		# code...
	 		$student_id = $courseRow['student_id'];
	 		$studentQuery = mysqli_query($con, "SELECT * FROM `students` WHERE id = '$student_id'");
	 		$studentRow = mysqli_fetch_array($studentQuery);
	 		array_push($studentsArray, $studentRow);

	 	}
	 	array_push($row, $studentsArray);
	 	array_push($coursesArray, $row);
	 } 


	$myJSON = json_encode($coursesArray);
 ?>