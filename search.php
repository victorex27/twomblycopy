<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation


if(isset($_GET['username'])){
	$username = $_GET['username'];
	  $a= $user->getUsername("$username%");
	 // var_dump($a[0]['id']);
	  //echo $a[0]['id'];
	  echo json_encode($a);
	  
	 
	  	
}


?>

