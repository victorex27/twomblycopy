<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation
if(isset($_POST)){
	  echo $user->recommend($_POST['to_id'], $_POST['from_id']);
}
?>

