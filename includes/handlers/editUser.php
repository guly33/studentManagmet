<?php 
	include '../config.php';
	include 'uploadImgHandler.php';
	if (isset($_POST['submit'])) {
		# code...
		$name = $_POST['newUserName'];
		$email = $_POST['newUserEmail'];
		$phone = $_POST['newUserPhone'];
		$role = $_POST['roleEdit'];
		$userId =$_POST['userEditId'];
		
		if (!empty($_POST['newPassword'])) {
			# code...
			$password = $_POST['newPassword'];
			$password = md5($password);
			if (!empty( $_FILES['newUserImageToUpload']["tmp_name"])) {
				# code...
				$imgPath = uploadImg($_FILES["newUserImageToUpload"], $_POST['submit']);
				$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$userId'");
				if (mysqli_num_rows($query) > 0) {
					# code...
					$query = mysqli_query($con, "UPDATE `users` SET `name`= '$name', `mail` = '$email', `phone` = '$phone', `password` = '$password', `role`='$role',`image` = '$imgPath' WHERE id = '$userId'");
				}
			} else {
				$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$userId'");
				if (mysqli_num_rows($query) > 0) {
					# code...
					$newQuery = mysqli_query($con, "UPDATE `users` SET `name`= '$name', `mail` = '$email', `phone` = '$phone', `password` = '$password', `role`='$role' WHERE id = '$userId'");
				}
			}
		} else {
			if (!empty( $_FILES['newUserImageToUpload']["tmp_name"])) {
				# code...
				echo "string";
				$imgPath = uploadImg($_FILES["newUserImageToUpload"], $_POST['submit']);
				$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$userId'");
				if (mysqli_num_rows($query) > 0) {
					# code...
					$query = mysqli_query($con, "UPDATE `users` SET `name`= '$name', `mail` = '$email', `phone` = '$phone', `role`='$role',`image` = '$imgPath' WHERE id = '$userId'");
				}
			} else {
				$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$userId'");
				if (mysqli_num_rows($query) > 0) {
					# code...
					$query = mysqli_query($con, "UPDATE `users` SET `name`= '$name', `mail` = '$email', `phone` = '$phone', `role`='$role' WHERE id = '$userId'");
				}
			}
		}


		header("Location: ../../index.php?main=admin");
		// header("Location: ../../".$_SESSION['page']);
	}
 ?>