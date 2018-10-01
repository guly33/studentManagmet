<?php 
	include '../config.php';
	include 'uploadImgHandler.php';
	
	if (isset($_POST['submit'])) {
		# code...
		$name = $_POST['userName'];
		$email = $_POST['userEmail'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$phone = $_POST['userPhone'];
		if (!(empty($_FILES['userImageToUpload']["tmp_name"]))) {
			# code...
			$imgPath = uploadImg($_FILES["userImageToUpload"], $_POST['submit']);
		} else {
			$imgPath = "assets/images/studentImg/no-avatar.jpg";
		}

		//INSERT STUDENT TO DB
		$query = mysqli_query($con, "SELECT * FROM users WHERE name = '$name'");
		if (mysqli_num_rows($query) < 1) {
			# code...
			$query = mysqli_query($con, "INSERT INTO `users`(`name`, `mail`, `phone`,`password`, `role`, `image`) VALUES ('$name','$email','$phone','$password','$role','$imgPath')");

			//UPDATE COURSE LIST
			if (!empty($_POST['course_list'])) {
				# code...
				$studentIdQuery = mysqli_query($con, "SELECT id FROM students WHERE name = '$name'");
				$row = mysqli_fetch_array($studentIdQuery);				
				$student_id = $row['id'];
				foreach ($_POST['course_list'] as $selected) {
					# code...
					$query = mysqli_query($con, "INSERT INTO `courseStudents`(`course_id`, `student_id`) VALUES ('$selected','$student_id')");

				}
			}
		}
		// header("Location: ../../index.php?main=school");		
	}
 ?>