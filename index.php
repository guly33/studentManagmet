<?php
	include 'includes/header.php';
	if ($_GET['main'] == 'school') {
		# code...
		include 'includes/school.php';
	}
	if ($_GET['main'] == 'admin') {
		# code...
		include 'includes/admin.php';
	}
 	include 'includes/footer.php';
 ?>
