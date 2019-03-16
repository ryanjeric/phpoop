<?php
	class dbConnect{
		function __construct(){
			$conn=mysql_connect("localhost", "root", "");
			mysql_select_db("examresult", $conn);
			if(!$conn){
				die("CONNOT CONNECT TO DB");
			}
			return $conn;
		}
		public function Close(){
			mysql_close();
		}
	}
?>