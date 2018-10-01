<?php 
	include '../config.php';
	include 'uploadImgHandler.php';
	if (isset($_POST['submit'])) {
		# code...
		$name = $_POST['newName'];
		$email = $_POST['newEmail'];
		$phone = $_POST['newPhone'];
		$studentId =$_POST['studentId'];
		
		
		if (!empty( $_FILES['newImageToUpload']["tmp_name"])) {
			# code...
			echo "string";
			$imgPath = uploadImg($_FILES["newImageToUpload"], $_POST['submit']);
			$query = mysqli_query($con, "SELECT * FROM students WHERE id = '$studentId'");
			if (mysqli_num_rows($query) > 0) {
				# code...
				$query = mysqli_query($con, "UPDATE `students` SET `name`= '$name', `mail` = '$email', `phone` = '$phone', `image` = '$imgPath' WHERE id = '$studentId'");
			}
		} else {
			$query = mysqli_query($con, "SELECT * FROM students WHERE id = '$studentId'");
			if (mysqli_num_rows($query) > 0) {
				# code...
				$query = mysqli_query($con, "UPDATE `students` SET `name`= '$name', `mail` = '$email', `phone` = '$phone' WHERE id = '$studentId'");
			}
		}

		//UPDATE COURSE LIST
		if (!empty($_POST['course_list'])) {
			# code...
			foreach ($_POST['course_list'] as $selected) {
			# code...
				$existQuery = mysqli_query($con, "SELECT * FROM `courseStudents` WHERE `student_id` = '$studentId' AND `course_id` = '$selected'");
				if (mysqli_num_rows($existQuery) < 1) {
					# code...
					$query = mysqli_query($con, "INSERT INTO `courseStudents`(`course_id`, `student_id`) VALUES ('$selected','$studentId')");
				}
			}
		}

		// header("Location: ../../index.php?main=school");
		// header("Location: ../../".$_SESSION['page']);
	}
 ?>