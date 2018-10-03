<?php include 'handlers/schoolDBhandler.php'; ?>
<script>
var mode = 'school';

courseArr = <?php echo $myJSON; ?>;
console.log(courseArr);
</script>
<div class="schoolContainer">
	<div class="row schoolRow">
		<div class="col-4">
			<div class="schoolNavs">
				<div class="row">
					<div class="col-6">
						<div class="schoolNavHead navHead">
							<h4>קורסים</h4>
						</div>
						<div class="coursesNavContainer NavContainer">
							<nav class="nav flex-column coursesNav" id="courses">
								<button class="btn addBtn" id="addCourseBtn"><i class="fas fa-plus"></i>הוסף קורס</button>
								<div class="alert alert-success courseAlerts" id="removeCourseSucsses" role="alert">
									נמחק בהצלחה!
								</div>
								<div class="modal deleteModals " tabindex="-1" role="dialog" id="removeStudentConfirm">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">הסר תלמיד מקורס</h5>
											</div>
											<div class="modal-body">
												<p>במידה והתלמיד לא רשום לקורסים נוספים, הוא ימחק ממאגר הנתונים</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger modalBtn" id="confirmRemoveStudent" data-dismiss="modal">הסר</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">בטל</button>
											</div>
										</div>
									</div>
								</div>
								<div class="modal deleteModals" tabindex="-1" role="dialog" id="removeCourseConfirm">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">מחק קורס</h5>
											</div>
											<div class="modal-body">
												<p>במידה ויש תלמידים רשומים לקורס הקורס לא ימחק</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger modalBtn" id="confirmRemoveCourse" data-dismiss="modal">מחק</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">בטל</button>
											</div>
										</div>
									</div>
								</div>
								<div class="modal deleteModals" tabindex="-1" role="dialog" id="deleteStudentConfirm">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">מחק תלמיד</h5>
											</div>
											<div class="modal-body">
												<p>התלמיד יוסר מכל הקורסים אליהם הוא רשום וימחק מהמאגר, האם להמשיך?</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger modalBtn" id="confirmDeleteStudent" data-dismiss="modal">מחק</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">בטל</button>
											</div>
										</div>
									</div>
								</div>
							</nav>
						</div>
					</div>
					<div class="col-6">
						<div class="schoolNavHead students">
							<h4>קורס</h4>
						</div>
						<div class="studentsNavContainer">
							<nav class="nav flex-column studentsNav" id="students">
								<button class="btn addBtn" id="addStudentBtn"><i class="fas fa-plus"></i>הוסף תלמיד</button>
								<div class="alert alert-success studentAlerts" id="removeStudentSucsses" role="alert">
									הוסר בהצלחה!
								</div>
								<div class="alert alert-danger studentAlerts" id="deleteStudentSucsses" role="alert">
									נחמק ממאגר הנתונים!
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-8">
			<div class="controlDivContainer">
				<div class="addStudent controlDiv" >
					<form action="includes/handlers/addStudentHandler.php" method="post" enctype="multipart/form-data" onsubmit="return studentValid(this)">
						<div class="form-group imageUpload">
							<label for="imageToUpload">תמונת פרופיל:</label>
							<div class="fileinputs">
								<div class="fakefile">
									<i class="fas fa-upload"></i>
								</div>
								<input type="file" class="form-control file" name="imageToUpload" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);"/>
								<img class="toUpload" src="#" alt=" " />
							</div>
						</div>
						<div class="form-group">
							<label for="name">שם מלא:</label>
							<input type="text" class="form-control" id="studentName" name="studentName" placeholder="הכנס שם תלמיד." required>
						</div>
						<div class="form-group">
							<label for="email">אימייל:</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="הכנס דואר אלקטרוני" aria-describedby="emailHelp" required>
							<small id="emailHelp" class="form-text text-muted">הדוא"ל ישמש גם כשם משתמש לכניסה למערכת</small>
						</div>
						<div class="form-group">
							<label for="phone">טלפון:</label>
							<input type="tel" class="form-control" id="phone" name="phone" required>
						</div>
						<div class="form-group">
							<?php include 'includes/coursesCheckbox.php'; ?>
						</div>
						<div class="alert alert-warning validAlerts" id="unvalidStudentInput" role="alert">
							
						</div>
						<button type="submit" class="btn btn-primary submitBtn" id="addStdntBtn" name="submit" value="addStudent">הוסף</button>
					</form>
				</div>
				<div class="addCourse controlDiv">
					<form action="includes/handlers/addCourseHandler.php" method="post"  enctype="multipart/form-data">
						<div class="form-group imageUpload">
							<label for="imageToUpload">תמונת פרופיל:</label>
							<div class="fileinputs">
								<div class="fakefile">
									<i class="fas fa-upload"></i>
								</div>
								<input type="file" class="form-control file" name="imageToUpload" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);" required />
								<img class="toUpload" src="#" alt=" " />
							</div>
						</div>
						<div class="form-group">
							<label for="name">שם קורס:</label>
							<input type="text" class="form-control" id="courseName" name="courseName" placeholder="הכנס שם קורס." required>
						</div>
						<div class="form-group">
							<label for="description">תיאור:</label>
							<br>
							<textarea name="description" class="styled" onfocus="this.value='';" required>הכנס תיאור קורס כאן</textarea>
						</div>
						<div class="submitContainer">
							<button type="submit" class="btn btn-primary submitBtn" name="submit" value="addCourse">הוסף</button>
						</div>
					</form>
				</div>
				<div class="controlDiv studentInfo">
					<div class="row">
						<div class="col-4">
							<img id="studentImg" src="#">
						</div>
						<div class="col-8">
							<h4 id="student"></h4>
							<div class="basicInfo">
								<p>מייל: <span id="studentMail"></span></p>
								<p>טלפון: <span id="studentPhone"></span></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="editStudent">
								<button class="btn btn-primary editBtn">edit</button>
								<div id="editFormContainer">
									<form method="post" action="includes/handlers/editStudent.php" enctype="multipart/form-data" onsubmit="return studentEditValid(this)">
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="newName">שנה שם:</label>
													<input type="text" class="form-control" id="newName" name="newName" placeholder="הכנס שם תלמיד." required>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group imageUpload">
													<label for="newImageToUpload">שנה תמונת פרופיל:</label>
													<div class="fileinputs">
														<div class="fakefile">
															<i class="fas fa-upload"></i>
														</div>
														<input type="file" class="form-control file" name="newImageToUpload" id="newImageToUpload" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);"/>
														<img class="toUpload" src="#" alt=" " />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="newEmail">שנה אימייל:</label>
													<input type="email" class="form-control" id="newEmail" name="newEmail" placeholder="הכנס דואר אלקטרוני" aria-describedby="emailHelp" required>
													<small id="emailHelp" class="form-text text-muted">הדוא"ל ישמש גם כשם משתמש לכניסה למערכת</small>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="newPhone">שנה טלפון:</label>
													<input type="tel" class="form-control" id="newPhone" name="newPhone" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-8">
												<div class="form-group">
													<?php include 'includes/coursesCheckbox.php'; ?>
												</div>
											</div>
											<div class="col-4">
												<input type="hidden" id="studentId" name="studentId">
												<div class="alert alert-warning validAlerts" id="unvalidStudentInput" role="alert">
													
												</div>
												<button type="submit"  class="btn btn-primary submitBtn" name="submit" value="updateStudent">עדכן</button>

											</div>
										</div>
									</form>
									<button class="btn btn-danger deleteStudentBtn deleteBtn" data-toggle="modal" data-target="#deleteStudentConfirm">מחק</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="controlDiv courseInfo">
					<div class="row">
						<div class="col-4">
							<img id="courseImg" src="#">
						</div>
						<div class="col-8">
							<h4 id="course"></h4>
							<div class="basicInfo">
								<p><h5>תיאור:</h5> <span id="courseDesc"></span></p>
							</div>
							<div class="studentListContainer">
								<ul class="studentsList">
									
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="editCourse">
								<button class="btn btn-primary editCourseBtn">edit</button>
								<div id="editCourseContainer">
									<form method="post" action="includes/handlers/editCourse.php" enctype="multipart/form-data">
										<div class="form-group imageUpload">
											<label for="editImageToUpload">תמונת פרופיל:</label>
											<div class="fileinputs">
												<div class="fakefile">
													<i class="fas fa-upload"></i>
												</div>
												<input type="file" class="form-control file" name="editImageToUpload" id="editImageToUpload" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);" value="" />
												<img class="toUpload" src="#" alt=" " />
											</div>
										</div>
										<div class="form-group">
											<label for="name">שם קורס:</label>
											<input type="text" class="form-control" id="editCourseName" name="editCourseName" placeholder="הכנס שם קורס.">
										</div>
										<div class="form-group">
											<label for="description">תיאור:</label>
											<br>
											<textarea name="editDescription" class="styled" id="editDescription">הכנס תיאור קורס כאן</textarea>
										</div>
										<div class="alert alert-warning courseAlerts" role="alert" id="removeCourseWarning">
											לא נמחק, ישנם תלמידים רשומים לקורס.
										</div>
										<div class="submitContainer">
											<input type="hidden" id="courseId" name="courseId">
											<button type="submit" class="btn btn-primary submitBtn" name="submit" value="editCourse">ערוך</button>
										</div>
									</form>
									<button class="btn btn-danger deleteBtn" data-toggle="modal" data-target="#removeCourseConfirm">מחק</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>