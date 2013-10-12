<?php
	ob_start();
	require_once("constants_local.php");
	session_start();
	class LOGIN{
		private $mysql;
		function __construct(){
			$this->mysql = mysqli_connect(DB_SERVER,DB_USER,DB_PWD,DB_NAME);
		}
		public function check_login($username,$password){
			$password = md5("sfyc".$password);
			$query = "select * from ".USER_TABLE." where username='".$username."' and password='".$password."' ";
			if($result = $this->mysql->query($query)){
				if($row = $result->fetch_assoc()){
					$_SESSION['username'] = $username;
					$_SESSION['LOGIN'] = TRUE;
					header("Location: index.php");
					exit();			
				}
				else{
					echo "Incorrect Password";
				}
			}
		}
		public function register_new_account($username,$password,$email){
			$query = "select * from ".USER_TABLE." where username='".$username."'";
			$password= md5("sfyc".$password);
			if($result = $this->mysql->query($query)){
				if(!($row = $result->fetch_assoc())){
					$query = "insert into users values(DEFAULT,'".$username."','".$password."','".$email."','null"."')";
					if($this->mysql->query($query)==1)
						echo "Registered!";	
				}
				else{
					echo "Account Exists!";
				}
			}
		}
	}
?>