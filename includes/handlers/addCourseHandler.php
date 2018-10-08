<?php 
	include '../config.php';
	include 'uploadImgHandler.php';
	
	if (isset($_POST['submit'])) {
		# code...
		$name = $_POST['courseName'];
		$desc = $_POST['description'];
		$imgPath = uploadImg($_FILES["imageToUpload"], $_POST['submit']);

		$query = mysqli_query($con, "SELECT * FROM courses WHERE name = '$name'") or die("Unable to Connect, sorry :D");
		if (mysqli_num_rows($query) < 1) {
			# code...
			$query = mysqli_query($con, "INSERT INTO `courses`(`name`, `description`, `image`) VALUES ('$name','$desc','$imgPath')") or die("Unable to Connect, sorry :D");
		}
		header("Location: ../../index.php?main=school&status=1");
		
	}
 ?>