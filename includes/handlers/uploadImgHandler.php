<?php 
	function uploadImg($img, $submit)
	{
		# code...
		if ($submit == 'addStudent' || $submit == 'updateStudent') {
			# code...
			$target_dir = "../../assets/images/studentImg/";
		} elseif ($submit == "addCourse" || $submit == 'editCourse') {
			# code...
			$target_dir = "../../assets/images/courseImg/";
		} else {
			$target_dir = "../../assets/images/avatars/";
		}
		// $target_dir = "../../assets/images/courseImg/";
		$target_file = $target_dir . basename($img["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		   $check = getimagesize($img["tmp_name"]);
		   if($check !== false) {
		       echo "File is an image - " . $check["mime"] . ".";
		       $uploadOk = 1;
		   } else {
		       echo "File is not an image.";
		       $uploadOk = 0;
		   }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		   echo "Sorry, file already exists.";
		   $uploadOk = 0;
		}
		// Check file size
		if ($img["size"] > 500000) {
		   echo "Sorry, your file is too large.";
		   $uploadOk = 0;

		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		   && $imageFileType != "gif" ) {
		   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		   $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		   echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		   if (move_uploaded_file($img["tmp_name"], $target_file)) {
		       echo "The file ". basename( $img["name"]). " has been uploaded.";
		   } else {
		       echo "Sorry, there was an error uploading your file.";
		   }
		}

		if ($submit == 'addStudent' || $submit == 'updateStudent') {
			# code...
			$filePath = "assets/images/studentImg/".$img['name'];
		} elseif ($submit == "addCourse" || $submit == 'editCourse') {
			# code...
			$filePath = "assets/images/courseImg/".$img['name'];
		} else {
			$filePath = "assets/images/avatars/".$img['name'];
		}
		return $filePath;
	
	}
 ?>