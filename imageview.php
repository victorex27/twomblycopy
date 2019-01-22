<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);

//$a = $user->selectBlob(19);
if(isset($_GET['user'])){
$result = $user->viewProfilePage($_GET['user']);
//while($row = $result->fetch(PDO::FETCH_ASSOC)){
//extract($row);
header("Content-Type:".$result['imageType'] );
echo $result['image'];

}


?>

