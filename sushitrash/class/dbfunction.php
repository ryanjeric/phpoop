<?php
	require_once 'dbconn.php';
	session_start();

		class dbFunction{
			
			function __construct(){
				$db = new dbConnect();
			}
			function __destruct(){

			}
			//LOGIN PROCESS
			public function Login($username,$password){
				$query = mysql_query("SELECT * FROM user where username = '".$username."' AND password = '".md5($password)."' AND status='ACTIVE'");
				$fetch = mysql_fetch_array($query);
				$rows = mysql_num_rows($query);

				$usertype = $fetch['usertype'];
				//check if user to login is Superadmin
				if($rows == 1 and $usertype == 'SUPERADMIN'){
					$_SESSION['SUPERADMIN'] = true;
					$_SESSION['id'] = $fetch['id'];
					$_SESSION['fname'] = $fetch['fname'];
					$_SESSION['mname'] = $fetch['mname'];
					$_SESSION['lname'] = $fetch['lname'];
					$_SESSION['position'] = $fetch['position'];
					$_SESSION['status'] = $fetch['status'];
					header("location: SUPERADMIN/index.php");
					return TRUE;
				}
				elseif($rows == 1)
				{
					$_SESSION['ADMIN'] = true;
					$_SESSION['id2'] = $fetch['id'];
					$_SESSION['fname'] = $fetch['fname'];
					$_SESSION['mname'] = $fetch['mname'];
					$_SESSION['lname'] = $fetch['lname'];
					$_SESSION['position'] = $fetch['position'];
					$_SESSION['status1'] = $fetch['status'];
					header("location: ADMIN/index.php");
					return TRUE;
				}
				else{
					return FALSE;
				}
			}
			//Logged in user Info
			public function myaccount($id){
				$query = mysql_query("SELECT * from user where id=$id");
				$fetch = mysql_fetch_array($query);

					$user = $fetch['username'];
					$password = $fetch['password'];
					$fname = $fetch['fname'];
					$mname = $fetch['mname'];
					$lname = $fetch['lname'];
					$email = $fetch['email'];
					$address = $fetch['address'];
					$company = $fetch['company'];
					$contact = $fetch['contact'];
					$position = $fetch['position'];
					$usertype = $fetch['usertype'];
					$status = $fetch['status'];
					return $wew=array($user,$password,$fname,$mname,$lname,$email,$address,$company,$contact,$position,$status,$usertype);

			}
			//Update Account
			public function updatemyaccount($id,$email,$pass,$fname,$lname,$mname,$address,$Company,$Contactno,$position,$status){
			
				if($pass == ""){
					$Update = mysql_query("Update user SET 
						email = '$email',
						fname = '$fname',
						lname = '$lname',
						mname = '$mname',
						address = '$address',
						company = '$Company',
						contact = '$Contactno',
						position = '$position',
						status = '$status'
						WHERE id = $id
						");
					if (mysql_affected_rows()==1)
					{
						return TRUE;
					}
					else
					{
						return FALSE;
					}
				}
				else{
					$password=md5($pass);
					$Update = mysql_query("Update user SET 
						email = '$email',
						password = '$password',
						fname = '$fname',
						lname = '$lname',
						mname = '$mname',
						address = '$address',
						company = '$Company',
						contact = '$Contactno',
						position = '$position',
						status = '$status'
						WHERE id = $id
						");
					if (mysql_affected_rows()==1)
					{
						return TRUE;
					}
					else
					{
						return FALSE;
					}
				}
			}
			//Update Check Email
			public function checkemail($email,$email2){
				if($email == $email2)
				{
					return FALSE;
				}
				else
				{
					$check = mysql_query("SELECT * FROM user WHERE email = '".$email."'");  
            		$row = mysql_num_rows($check);
            		if($row > 0){  
		                return true;  
		            } 
		            else {  
		                return false;  
		            }   
				}

			}
			//Add user
			public function adduser($username,$email,$pass,$fname,$lname,$mname,$address,$Company,$Contactno,$position,$Status){
				$md5pass = md5($pass);
				mysql_query("Insert into user(
					username,
					email,
					password,
					fname,
					lname,
					mname,
					address,
					company,
					contact,
					position,
					status,
					usertype,
					datecreated
					) 
					VALUES (
					'$username',
					'$email',
					'$md5pass',
					'$fname',
					'$lname',
					'$mname',
					'$address',
					'$Company',
					'$Contactno',
					'$position',
					'$Status',
					'ADMIN',
					NOW()
					)");
				return TRUE;
			}
			//Check Existing Email - Add
			public function email($email){
				$check = mysql_query("SELECT * FROM user where email = '".$email."'");
				$row = mysql_num_rows($check);
				if($row > 0){  
		                return true;  
		            } 
		            else {  
		                return false;  
		            }   

			}
			//Check Existing User
			public function user($username){
				$check = mysql_query("SELECT * FROM user where username = '".$username."'");
				$row = mysql_num_rows($check);
				if($row > 0){  
		                return true;  
		            } 
		            else {  
		                return false;  
		            }   
			}
			//Pagination
			public function paginate($userid,$username,$lname,$fname,$mname,$datecreated,$position,$status,$usertype,$per_page){
				$total_values = count($userid);
				if(isset($_GET['page'])){
					$current_page = $_GET['page'];
				}
				else{
					$current_page = 1;
				}
				$counts = ceil($total_values / $per_page);
				$param1 = ($current_page - 1) * $per_page;

				//DATA ARRAY
				$this->userid = array_slice($userid,$param1,$per_page);
				$this->username = array_slice($username,$param1,$per_page);
				$this->lname = array_slice($lname,$param1,$per_page);
				$this->fname = array_slice($fname,$param1,$per_page);
				$this->mname = array_slice($mname,$param1,$per_page);
				$this->datecreated = array_slice($datecreated,$param1,$per_page);
				$this->position = array_slice($position,$param1,$per_page);
				$this->status = array_slice($status,$param1,$per_page);
				$this->usertype = array_slice($usertype,$param1,$per_page);
					 
				for($x=1; $x<= $counts; $x++){
				$numbers[] = $x;
				}
				return $numbers;			
			}
			//Transfer data to array
			function userid(){ 
				$userid = $this->userid;
				return $userid;
			}
			function username(){ 
				$username = $this->username;
				return $username;
			}
			function lname(){ 
				$lname = $this->lname;
				return $lname;
			}	
			function fname(){ 
				$fname = $this->fname;
				return $fname;
			}	
			function mname(){ 
				$mname = $this->mname;
				return $mname;
			}	
			function datecreated(){ 
				$datecreated = $this->datecreated;
				return $datecreated;
			}	
			function position(){ 
				$position = $this->position;
				return $position;
			}	
			function status(){ 
				$status = $this->status;
				return $status;
			}
			function usertype(){ 
				$usertype = $this->usertype;
				return $usertype;
			}
			//DELETE USER ACCOUNT
			public function delete($id){
				mysql_query("DELETE from user where id=$id");
				return TRUE;
			}


		}



// VERY NEWBIE TO OOP - REFERENCES	
// http://cleartuts.blogspot.com/2014/12/php-data-update-and-delete-using-oops.html

// https://github.com/rorystandley/MySQL-CRUD-PHP-OOP

// http://www.9lessons.info/2011/02/php-object-oriented-programming.html

// http://code.tutsplus.com/tutorials/object-oriented-php-for-beginners--net-12762

// http://www.php5dp.com/basic-php-mysql-oop/

// http://www.c-sharpcorner.com/UploadFile/4ab77c/create-login-and-registration-form-in-php-by-using-oops-conc/

// https://rexadrivan.wordpress.com/2013/03/08/oop-class-pagination-php/
?>