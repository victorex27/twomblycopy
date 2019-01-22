<?php
session_start();
if(isset($_POST)){
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation



/* Getting file name */
		$uploaddir = 'tmp/';
$uploadfile = $uploaddir .$_SESSION['id']. basename($_FILES["file"]["name"]);



if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile)) 
{

//$handle = fopen("$uploadfile", "r");
echo "through";
//echo $blobObj->insertBlob($uploadfile,$_FILES['file']['type']);
echo $user->changeProfilePicture($uploadfile,$_FILES['file']['type']);
unlink($uploadfile);
}


		
		

	  
	  	
}
?>

