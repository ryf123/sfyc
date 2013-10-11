<?php
	ob_start();
	require_once("constants_local.php");
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
					header("Location: index.html");
					exit();			
				}
				else{
					echo "Incorrect Password";
				}
			}
		}
		public function register_new_account($username,$password,$email){
			$query = "select * from ".USER_TABLE." where username='".$username."'";
			if($result = $this->mysql->query($query)){
				if(!($row = $result->fetch_assoc())){
					$query = "insert into users values(DEFAULT,'".$username."','".$password."','".$email."')";
					$this->mysql->query($query);
					echo "Registered!";
				}
				else{
					echo "Account Exists!";
				}
			}
		}
	}
?>