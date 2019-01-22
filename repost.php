<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation
if(isset($_POST)){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$message = $_POST['message'];
	$category = $_POST['category'];

	  if($_POST['pState'] == "true"){

	  		echo $user->makePost($user->getCategoryByName($category),$title,$message);
	  	
	  }else {

	  		echo $user->reEditPreviousPost($id,$category,$title,$message);

	  		
	  	

	  }

	  
}
?>

