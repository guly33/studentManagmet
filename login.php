<?php
	include 'includes/config.php';
	include 'includes/classes/Account.php';
	include 'includes/classes/Constants.php';
	$account = new Account($con);
	include 'includes/handlers/loginHandler.php';
?>
<!doctype html>
<html lang="he" dir="rtl">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="assets/css/login.css">
		<title>Login</title>
	</head>
	<body>
		<div class="container">
			<h1>SMS - Student Managment System</h1>
			<div class="loginContainer rtl" >
				<h2> שלום אורח!</h2>
				<p>נא התחבר כדי לגשת למערכת.</p>
				<form id="loginForm" action="login.php" method="post">
					<div class="form-group formElement">
						<?php echo $account->getError(Constants::$loginFaild); ?>
						<label for="userEmail" class="float-right">כתובת מייל</label>
						<input type="email" class="form-control" id="userEmail" name="userEmail" aria-describedby="emailHelp" placeholder="הכנס מייל להרשמה">
						<small id="emailHelp" class="form-text text-muted">ההרשמה היא פרטית, לעולם לא נחלוק את האימייל שלך עם צד שלישי</small>
					</div>
					<div class="form-group formElement">
						<label for="userPassword" class="float-right">סיסמא</label>
						<input type="password" name="userPassword" class="form-control float-right" id="userPassword" placeholder="הכנס סיסמא">
					</div>
					<div class="formElement">
						<button type="submit" name="loginButton" id="loginButton" class="btn btn-success float-right">התחבר</button>
					</div>
				</form>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>