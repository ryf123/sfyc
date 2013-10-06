<?php
	require_once("constants.php");
	class LOGIN{
		private $mysql;
		function __construct(){
			$this->mysql = mysqli_connect(DB_SERVER,DB_USER,DB_PWD,DB_NAME);
		}
		public function check_login($username,$password){
			$query = "select * from ".USER_TABLE." where username='".$username."' and password='".$password."' ";
			if($result = $this->mysql->query($query)){
				if($row = $result->fetch_assoc()){
					$_SESSION['LOGIN'] = TRUE;
					header("Location: login.php");			
				}
			}
		}
		public function mysql_connection(){
			
		}	
	}
?>