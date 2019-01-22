<?php

session_start();
include_once('user.php');
$user = new User($_SESSION['id']);
//form validation


if(isset($_GET['index'])){

	$res = $user->getPost($_GET['index']);

		$arrayName = array();
		while($row = $res->fetch(PDO::FETCH_ASSOC)){
			extract($row);


			$arrayName = array('time' => $time, 'category' =>$category, 'title'=>$title,'message'=> $message ,'id'=>$post_id);

		}



		echo json_encode($arrayName);

}



?>

