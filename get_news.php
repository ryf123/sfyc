<?php
	require_once 'constants_local.php';
	class get_news{
		private $mysql;
		private $photo_array = array();
		private  $topic_array = array();
		function __construct(){
			mysql_connect(DB_SERVER,DB_USER,DB_PWD);
			@mysql_select_db(DB_NAME) or die( "Unable to select database");
		}	
		public function retrieve_news(){
			$query = "select topic_id from ".TOPIC_TABLE." WHERE visibility_type='public' ORDER BY ts DESC" ." LIMIT 9";
			$result  = mysql_query($query);
			while ($row = mysql_fetch_row($result)){
				array_push($this->topic_array,$row[0]);
			}
			foreach($this->topic_array as &$topic_id){
				$tmp_photo_array=array();
				$query = "select location from ".PHOTO_TABLE." WHERE topic_id='".$topic_id."' LIMIT 9";
				$result  = mysql_query($query);
				while ($row = mysql_fetch_row($result)){
					array_push($tmp_photo_array,$row[0]);
				}
				array_push($this->photo_array,$tmp_photo_array);				
			}
			return $this->photo_array;	
		}
	}
?>