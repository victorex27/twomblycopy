<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);

//$a = $user->selectBlob(19);
if(isset($_GET['id'])){
$result = $user->selectGallery($_GET['id']) ;
//while($row = $result->fetch(PDO::FETCH_ASSOC)){
//extract($row);
header("Content-Type:".$result['mime'] );
echo $result['data'];

}


?>

