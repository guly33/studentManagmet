<?php
	if (isset($_POST['loginButton'])) {
		# code...
		$userEmail = $_POST['userEmail'];
		$password = $_POST['userPassword'];

		$result = $account->login($userEmail, $password);

		if ($result) {
			# code...
			$_SESSION['userLoggedIn'] = $userEmail;
			header("Location: index.php?main=school");
		}
	}
?>