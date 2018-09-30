<?php 
	include 'config.php';

	$query = mysqli_query($con, "SELECT `id`, `name` FROM `courses`");

	while ($row = mysqli_fetch_array($query)) {
		# code...
		echo "
			<div class='checkCourseContainer required'>
				<input type='checkbox' name='course_list[]' value='".$row['id']."'>
				<label for='".$row['name']."'>".$row['name']."</label>	
			</div>
			";
	}
 ?>

