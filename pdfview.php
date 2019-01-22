<?php
session_start();
include_once('user.php');
$user = new User($_SESSION['id']);

//$a = $user->selectBlob(19);
if(isset($_GET['pdf_id'])){
$data = $user->getPdf($_GET['pdf_id']);
//while($row = $result->fetch(PDO::FETCH_ASSOC)){
//extract($row);
header("Content-Type:application/pdf");
echo $data;

}


?>

