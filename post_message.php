<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation
if(isset($_POST)){
	  
	  if($user->makePost($_POST['category'],$_POST['title'],$_POST['message'])){
	  	echo "Successful";
	  }else{
	  	echo "Unsuccessful";
	  }
}
?>

