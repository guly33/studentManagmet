<?php
/**
 * 
 */
	class Account {
		private $con;
		private $errorArray;

		public function __construct($con)
		{
			# code...
			$this->con = $con;
			$this->errorArray = array();

		}

		public function login($um, $pw)
		{
			# code...
			// $pw = md5($pw);

			$query = mysqli_query($this->con, "SELECT * FROM `users` WHERE mail='$um' AND password='$pw'");

			if (mysqli_num_rows($query) == 1) {
				# code...
				return true;
			} else {
				array_push($this->errorArray, Constants::$loginFaild);
				return false;
			}
		}
		
		public function getError($error)
		{
			# code...
			if (!in_array($error, $this->errorArray)) {
				# code...
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

	}
?>
