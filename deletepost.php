<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation
if(isset($_POST)){
	$id = $_POST['id'];

	
	  		echo $user->deletePost($id);
	  	
	  
}

?>

