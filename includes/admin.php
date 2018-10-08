<?php include 'handlers/adminHandler.php';?>
<script>
var mode = 'admin';
usersArr = <?php echo $myJSON; ?>;
roleArr = <?php echo $roleJson; ?>;
console.log(usersArr);
</script>
<div class="adminContainer">
	<div class="alert alert-success queryAlert" id="queryAdminSucsses" role="alert">
		פעולה הושלמה בהצלחה
	</div>
	<div class="row adminRow">
		<div class="col-3 stretchLeft">
			<div class="adminNavHead navHead">
				<h4>בעלי תפקיד:</h4>
			</div>
			<div class="adminNavContainer NavContainer">
				<nav class="nav flex-column adminNav" id="users">
					<button class="btn addBtn owner" id="addUserBtn"><i class="fas fa-plus"></i>הוסף תפקיד</button>
					<div class="alert alert-success userAlerts" id="deleteUserSucsses" role="alert">
						הוסר בהצלחה!
					</div>
				</nav>
			</div>
		</div>
		<div class="col-9">
			<div class="modal deleteModals " tabindex="-1" role="dialog" id="deleteUserConfirm">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">הסר משתמש</h5>
						</div>
						<div class="modal-body">
							<p>האם להסיר משתמש?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger modalBtn" id="confirmDeleteUser" data-dismiss="modal">הסר</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">בטל</button>
						</div>
					</div>
				</div>
			</div>
			<div class="controlDivContainer">
				<div class="addUser controlDiv slideExpandUp" >
					<form action="includes/handlers/addUserHandler.php" method="post" enctype="multipart/form-data" onsubmit="return userValid(this)">
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
							<input type="text" class="form-control" id="userName" name="userName" placeholder="הכנס שם מלא." required>
						</div>
						<div class="form-group">
							<label for="userEmail">אימייל:</label>
							<input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="הכנס דואר אלקטרוני" aria-describedby="emailHelp" required>
							<small id="emailHelp" class="form-text text-muted">הדוא"ל ישמש גם כשם משתמש לכניסה למערכת</small>
						</div>
						<div class="form-group">
							<label for="password">סיסמא:</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="לפחות שישה תווים" required>
						</div>
						<div class="form-group">
							<label for="userPhone">טלפון:</label>
							<input type="tel" class="form-control" id="userPhone" name="userPhone" required>
						</div>
						<select name="role" class="roleSelect">
						</select>
						<div class="alert alert-warning validAlerts" id="unvalidInput" role="alert">
						
						</div>	
						<button type="submit" class="btn btn-primary submitBtn" id="submitUserBtn" name="submit" value="addUser">הוסף</button>
					</form>
				</div>
				<div class="controlDiv userInfo stretchLeft">
					<div class="row">
						<div class="col-4">
							<img id="userImg" src="#">
						</div>
						<div class="col-8">
							<h4 id="user"></h4>
							<div class="basicInfo">
								<p>טלפון: <span id="userCellphone"></span></p>
								<p>מייל: <span id="userMail"></span></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="editUser manager">
								<button class="btn btn-primary editUserBtn">edit</button>
								<div id="editUserFormContainer">
									<form method="post" action="includes/handlers/editUser.php" enctype="multipart/form-data" onsubmit="return userEditValid(this)">
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="newUserName">שנה שם:</label>
													<input type="text" class="form-control" id="newUserName" name="newUserName" placeholder="הכנס שם משתמש." required>
												</div>
												<div class="form-group">
													<label for="newUserEmail">שנה אימייל:</label>
													<input type="email" class="form-control" id="newUserEmail" name="newUserEmail" placeholder="הכנס דואר אלקטרוני" aria-describedby="emailHelp" required>
													<small id="emailHelp" class="form-text text-muted">הדוא"ל ישמש גם כשם משתמש לכניסה
													למערכת</small>
												</div>
												<div class="form-group">
													<label for="newPassword">שנה סיסמא:</label>
													<input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="לפחות שישה תווים">
												</div>
												<div class="form-group">
													<label for="newUserPhone">שנה טלפון:</label>
													<input type="tel" class="form-control" id="newUserPhone" name="newUserPhone" required>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group imageUpload">
													<label for="newUserImageToUpload">שנה תמונת פרופיל:</label>
													<div class="fileinputs">
														<div class="fakefile">
															<i class="fas fa-upload"></i>
														</div>
														<input type="file" class="form-control file" name="newUserImageToUpload" id="newUserImageToUpload" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);"/>
														<img class="toUpload" src="#" alt=" " />
													</div>
												</div>
												<select name="roleEdit" id="roleEdit" class="roleSelect">
												</select>
											</div>
										</div>
										<input type="hidden" id="userEditId" name="userEditId">
										<div class="alert alert-warning validAlerts" role="alert">
							
										</div>
										<button type="submit"  class="btn btn-primary submitBtn" name="submit" value="updateUser">עדכן</button>
									</form>
									<button class="btn btn-danger deleteUserBtn deleteBtn" data-toggle="modal" data-target="#deleteUserConfirm">מחק</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>