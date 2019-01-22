<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation
if(isset($_POST)){
	  echo $user->addToBookmarks($_POST['user_id']);
	  	
}
?>

