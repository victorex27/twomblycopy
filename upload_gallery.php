<?php
session_start();
if(isset($_POST)){
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation

//echo ($_FILES['file']['name'][0]);

$result = array();

try{

	foreach ($_FILES["file"]['name'] as $key => $value) {
	
		/* Getting file name */
 $uploaddir = 'tmp/';
$uploadfile = $uploaddir .$_SESSION['id']. basename($value);



if (move_uploaded_file($_FILES["file"]["tmp_name"][$key], $uploadfile)) 
{

//$handle = fopen("$uploadfile", "r");

//echo $blobObj->insertBlob($uploadfile,$_FILES['file']['type']);
array_push($result,$user->uploadFile($uploadfile,$_FILES['file']['type'][$key]));
unlink($uploadfile);
}


	

	}
	echo json_encode($result);

	}catch(\ Exception $ex){

		echo 0;
	}

		

	  
	  	
}
?>

