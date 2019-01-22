<?php
session_start();


 
// query products
if(isset($_GET)  ){

// include database and object files
include_once '../config/database.php';

 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
$query = "SELECT id, name from category";
 
 //$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
 
    // prepare query statement
    $stmt = $db->prepare($query);
	
	$stmt->execute();
$num = $stmt->rowCount();

$result = [];
$result["records"] = [];
//echo $num;
if ($num > 0) {
	$count = 0;
	//echo "<div class='card-group'>";
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		
	extract($row);
	
	$ans = array(
 
    "id" =>  $id,
    "name" => $name
    );
	
	
	
	
array_push($result["records"], $ans);

	$count ++;
}


}

 echo json_encode( $result ); 

}else{
	
	echo false;
}
 
?>