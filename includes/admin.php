<?php include 'handlers/adminHandler.php'; ?>
<script>
var mode = 'admin';
usersArr = <?php echo $myJSON; ?>;
console.log(usersArr);
</script>
<div class="adminContainer">
	<div class="row adminRow">
		<div class="col-3">
			<div class="adminNavHead navHead">
				<h4>בעלי תפקיד:</h4>
			</div>
			<div class="adminNavContainer NavContainer">
				<nav class="nav flex-column adminNav" id="workers">
					<button class="btn addBtn" id="addWorkerBtn"><i class="fas fa-plus"></i>הוסף תפקיד</button>
				</nav>
			</div>
		</div>
		<div class="col-9">
			<div class="controlDivContainer">
				<div class="addUser controlDiv" >
					<form action="includes/handlers/addUserHandler.php" method="post" enctype="multipart/form-data">
						<!-- onsubmit="return userValid(this)" -->
						<div class="form-group imageUpload">
							<label for="userImageToUpload">תמונת פרופיל:</label>
							<div class="fileinputs">
								<div class="fakefile">
									<i class="fas fa-upload"></i>
								</div>
								<input type="file" class="form-control file" name="userImageToUpload" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);"/>
								<img class="toUpload" src="#" alt=" " />
							</div>
						</div>
						<div class="form-group">
							<label for="userName">שם מלא:</label>
							<input type="text" class="form-control" id="userName" name="userName" placeholder="הכנס שם תלמיד." required>
						</div>
						<div class="form-group">
							<label for="userEmail">אימייל:</label>
							<input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="הכנס דואר אלקטרוני" aria-describedby="emailHelp" required>
							<small id="emailHelp" class="form-text text-muted">הדוא"ל ישמש גם כשם משתמש לכניסה למערכת</small>
						</div>
						<div class="form-group">
							<label for="password">סיסמא:</label>
							<input type="password" class="form-control" id="password" name="password" required>
						</div>
						<div class="form-group">
							<label for="userPhone">טלפון:</label>
							<input type="tel" class="form-control" id="userPhone" name="userPhone" required>
						</div>
						<select name="role">
							<option value="0">owner</option>
						</select>

						<button type="submit" class="btn btn-primary submitBtn" id="addRoleBtn" name="submit" value="addStudent">הוסף</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>