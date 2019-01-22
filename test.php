<?php
session_start();

/*
if(!isset($_SESSION['username'])){
	
header('location:landing page.php');
	
}

*/

include_once('user.php');
$user = new User($_SESSION['id']);
//$result = $user->getProfileImage();

//echo $user->uploadDocuments('tmp/5388059654.pdf','89','5','e','w');

$result = $user->getPostById(6);
if($result->rowCount() < 1){
	
	echo "no result found";
	
}else{
	
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
extract($row);

	echo "this is the result of the query.".$post_id;
	
}
	
}



//var_dump($b);

?>
