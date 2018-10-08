<?php 
	include '../config.php';
	include 'uploadImgHandler.php';
	
	if (isset($_POST['submit'])) {
		# code...
		$name = $_POST['studentName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		if (!(empty($_FILES['imageToUpload']["tmp_name"]))) {
			# code...
			$imgPath = uploadImg($_FILES["imageToUpload"], $_POST['submit']);
		} else {
			$imgPath = "assets/images/studentImg/no-avatar.jpg";
		}

		//INSERT STUDENT TO DB
		$query = mysqli_query($con, "SELECT * FROM students WHERE name = '$name'") or die("Unable to Connect, sorry :D");
		if (mysqli_num_rows($query) < 1) {
			# code...
			$query = mysqli_query($con, "INSERT INTO `students`(`name`, `mail`, `phone`, `image`) VALUES ('$name','$email','$phone','$imgPath')") or die("Unable to Connect, sorry :D");

			//UPDATE COURSE LIST
			if (!empty($_POST['course_list'])) {
				# code...
				$studentIdQuery = mysqli_query($con, "SELECT id FROM students WHERE name = '$name'") or die("Unable to Connect, sorry :D");
				$row = mysqli_fetch_array($studentIdQuery);				
				$student_id = $row['id'];
				foreach ($_POST['course_list'] as $selected) {
					# code...
					$query = mysqli_query($con, "INSERT INTO `courseStudents`(`course_id`, `student_id`) VALUES ('$selected','$student_id')") or die("Unable to Connect, sorry :D");

				}
			}
		}
		header("Location: ../../index.php?main=school&status=1");		
	}
 ?>