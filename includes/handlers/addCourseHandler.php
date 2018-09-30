<?php 
	include '../config.php';
	include 'uploadImgHandler.php';
	
	if (isset($_POST['submit'])) {
		# code...
		$name = $_POST['courseName'];
		$desc = $_POST['description'];
		$imgPath = uploadImg($_FILES["imageToUpload"], $_POST['submit']);

		$query = mysqli_query($con, "SELECT * FROM courses WHERE name = '$name'");
		if (mysqli_num_rows($query) < 1) {
			# code...
			$query = mysqli_query($con, "INSERT INTO `courses`(`name`, `description`, `image`) VALUES ('$name','$desc','$imgPath')");
		}
		header("Location: ../../index.php?main=school");
		// header("Location:" echo .$_SERVER['SERVER_NAME'].$_SESSION['page'];);
		
	}
 ?>