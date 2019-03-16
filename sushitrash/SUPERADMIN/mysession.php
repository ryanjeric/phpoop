<?php
if(isset($_POST['logout'])){
 	unset($_SESSION['SUPERADMIN']);
 	header("Location:../index.php");  

}

if(!($_SESSION)){  
     unset($_SESSION['SUPERADMIN']);
     header("Location:../index.php");  
}

if(!isset($_SESSION['SUPERADMIN'])){
  	header("Location:../index.php");
}
?>