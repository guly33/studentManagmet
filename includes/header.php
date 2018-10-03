<?php
	include 'includes/config.php';

	if (!$_SESSION['userLoggedIn']) {
		# code...
			header("Location: login.php");
	}

	if (isset($_POST['logout'])) {
		# code...
		
		unset($_SESSION);
		session_destroy();
		header("Location: ../login.php");
	}
	$rolesArr = array("owner", "manager", "salesman");
	$roleJson = json_encode($rolesArr);
	$userName = "";
	$userRole = "";
	$userImg = "assets/images/avatars/admin-avatar.png";
	if (isset($_SESSION['userLoggedIn'])) {
		# code...
		$email = $_SESSION['userLoggedIn'];
		$query = mysqli_query($con, "SELECT * FROM users WHERE mail = '$email'");
		$row = mysqli_fetch_assoc($query);
		if (!empty($row)) {
			# code...
			$userName = $row['name'];
			$userRole = $rolesArr[$row['role']];
			$userImg = $row['image'];
		}
	}
?>
<!doctype html>
<html lang="he" dir="rtl">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,500,700" rel="stylesheet"> 
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<title>TheSchool-SMS</title>
	</head>
	<body>
		<!-- header -->
		<div class="container-fluid mainContainer">
			<nav class="nav mainNav">
				<div class="rightContainer">
					<div class="userInfoContainer">
						
						<ul class="nav">
							<li class="nav-item imageLi">
								<img src="<?php echo $userImg; ?>">
							</li>
							<li class="nav-item textInfo">
								<span id="userRole">
									<?php echo $userRole." - ".$userName;?>
								</span>
							</li>
							<li>
								<form action="includes/header.php" method="POST">
									<button type="submit" name="logout" class="btn btn-outline-danger logoutBtn">LOGOUT</button>
								</form>
							</li>
						</ul>
					</div>
				</div>
				<div class="centerContainer">
					<div class="navContainer">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link btn" href="?main=school">School</a>
							</li>
							<li class="nav-item">
								<a class="nav-link btn" href="?main=admin">Admin</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="leftContainer">
					<div class="logoContainer">
						<img src="assets/images/johnBryceLogo.png">
					</div>
				</div>
			</nav>