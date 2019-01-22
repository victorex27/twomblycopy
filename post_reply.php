<?php

session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation

//echo "you";
/* Getting file name */

$file = null;

if(isset($_FILES["file"]["name"])){

	$uploaddir = 'tmp/';
$uploadfile = $uploaddir .$_SESSION['id']. basename($_FILES["file"]["name"]);

//var_dump($_POST);
		//echo $_POST['title'];
		//echo $_FILES['file']['name'];



if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile)) 
{

//$handle = fopen("$uploadfile", "r");

//echo $blobObj->insertBlob($uploadfile,$_FILES['file']['type']);
return $user->uploadDocuments($uploadfile,$_FILES['file']['type'],$_POST['post_id_field'],$_POST['title'],$_POST['message']);
//unlink($uploadfile);
}



}else if(isset($_POST['title']) && isset($_POST['message'])){
	  if($user->replyToPost($_POST['post_id_field'],$_POST['title'],$_POST['message'])){
	  	echo "Successful";
	  }else{
	  	echo "Unsuccessful";
	  }
}


?>

