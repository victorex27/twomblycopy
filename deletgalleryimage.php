<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation
if(isset($_GET)){
	  echo $user->deleteFromGallery($_GET['id']);
	  	
}
?>

