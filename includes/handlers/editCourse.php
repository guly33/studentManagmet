<?php 
	include '../config.php';
	include 'uploadImgHandler.php';
	if (isset($_POST['submit']) && $_POST['submit'] == 'editCourse') {
		# code...
		$name = $_POST['editCourseName'];
		$desc = $_POST['editDescription'];
		$courseId = $_POST['courseId'];

		if (!empty($_FILES['editImageToUpload']["tmp_name"])) {
			# code...
			echo "string";
			$imgPath = uploadImg($_FILES["editImageToUpload"], $_POST['submit']);
			$query = mysqli_query($con, "SELECT * FROM courses WHERE id = '$courseId'");
			if (mysqli_num_rows($query) > 0) {
				# code...
				$query = mysqli_query($con, "UPDATE `courses` SET `name`= '$name', `description` = '$desc' , `image` = '$imgPath' WHERE id = '$courseId'");
			}
		} else {
			$query = mysqli_query($con, "SELECT * FROM courses WHERE id = '$courseId'");
			if (mysqli_num_rows($query) > 0) {
				# code...
				$query = mysqli_query($con, "UPDATE `courses` SET `name`= '$name', `description` = '$desc' WHERE id = '$courseId'");
			}
		}

		header("Location: ../../index.php?main=school");
		// header("Location: ../../".$_SESSION['page']);
	}
 ?>