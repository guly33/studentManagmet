<?php 
	include '../config.php';
	include 'uploadImgHandler.php';
	
	if (isset($_POST['submit'])) {
		# code...
		$name = $_POST['userName'];
		$email = $_POST['userEmail'];
		$password = $_POST['password'];
		$password = md5($password);
		$role = $_POST['role'];
		$phone = $_POST['userPhone'];

		$query = mysqli_query($con, "SELECT * FROM users WHERE `mail`='$email'") or die("Unable to Connect, sorry :D");
		if (mysqli_num_rows($query) > 0) {
			# code...
			echo "emailExist";
			header("Location: ../../index.php?main=admin&error=emailExist");
			exit();		
		}
		if (!(empty($_FILES['userImageToUpload']["tmp_name"]))) {
			# code...
			$imgPath = uploadImg($_FILES["userImageToUpload"], $_POST['submit']);
		} else {
			$imgPath = "assets/images/avatars/admin-avatar.png";
		}

		//INSERT STUDENT TO DB
		$query = mysqli_query($con, "SELECT * FROM users WHERE name = '$name'") or die("Unable to Connect, sorry :D");
		if (mysqli_num_rows($query) < 1) {
			# code...
			$query = mysqli_query($con, "INSERT INTO `users`(`name`, `mail`, `phone`,`password`, `role`, `image`) VALUES ('$name','$email','$phone','$password','$role','$imgPath')") or die("Unable to Connect, sorry :D");

		}
		header("Location: ../../index.php?main=admin&status=1");		
	}
 ?>