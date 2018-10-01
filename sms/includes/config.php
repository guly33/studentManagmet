<?php
	// ob_start();
	if (session_status() == PHP_SESSION_NONE) {
   	 session_start();
	}
	$timezone = date_default_timezone_set("Asia/Jerusalem");

	$con = mysqli_connect("localhost", "root", "", "theSchool");
	if (mysqli_connect_errno()) {
		# code...
		echo "Failed connecting to DB:".mysqli_connect_errno();
	}
?>