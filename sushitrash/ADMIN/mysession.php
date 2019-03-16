<?php
if(isset($_POST['logout'])){
 	unset($_SESSION['ADMIN']);
 	header("Location:../index.php");  

}

if(!($_SESSION)){  
     unset($_SESSION['ADMIN']);
     header("Location:../index.php");  
}

if(!isset($_SESSION['ADMIN'])){
  	header("Location:../index.php");
}
?>