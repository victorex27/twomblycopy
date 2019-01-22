<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation
if(isset($_POST)){
	  if($user->replyToMessage($_POST['user_id'],$_POST['title'],$_POST['message'])){
	  	echo "Successful";
	  }else{
	  	echo "Unsuccessful";
	  }
}
?>
