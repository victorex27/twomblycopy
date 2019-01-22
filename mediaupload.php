<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:landing page.php');

	
		

}
	
	
	
	

?>



<!DOCTYPE html>
<html>
<head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w32.css">
<script src="jquery.js"></script>
<script src="readmore.js"></script>
<style>

body {
     background-color:#F8F8F8 ;
	 margin: 0;
	 }

.nav{
  width:100%;
  background-color: #3399FF;
  overflow: auto;
	 
}

ul{
padding:0;
margin: 0;
list-style:none;
}

li{
float:left;
}
a:link{
hover: blue;
width: 110px;
display:block;
padding:15px;
color:white;
text-decoration:none;
font-family:verdana;
font-size: 10px;
text-align: center;
text-transform: uppercase;
}

.red:hover {
   background-color:;
   color: blAck;
   }
   
.search{
margin-left: 350px;
width:400px;
padding: px;
border-radius:10px 10px 10px 10px;
border: none;
border:1px solid blue;
font-size:10px;
text-align:center;
margin-top:13px;
height:20px
}

</style>
</head>
<body>

<div class="nav">
 <ul>
 <li style="color: white"><a href="">TWOMBLY</a></li>
 <input type="text" name="searchbox" class="search" placeholder="search here">
  <li style="float:right; color: white"><a class="red" href="logout.php">Log Out</a></li>
  <li style="float: right; color: white; padding-left: 5px"><a class="red" href="">Premium</a></li>
  <li style="float: right; color: white"><a class="red" href="companyloggedin.php">Dashboard</a></li>
	<li>
	
	</li>
  </ul>
</div>


<div class="w3-container w3-white" style="width: 700px; height: 900px; margin-left: 310px; margin-top: 10px">
<center><h2>MEDIA UPLOAD</h2></center>
<center><h5>Upload Profile Picture </h5></center><br>





<?php
  
  include_once('server.php');
 
      if (isset($_POST['submit']))
	  {

$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "UPDATE userclass_b SET image='$file'";
   if(mysqli_query($conn, $query))
{
    echo '<script>alert("Image Uploaded Successfully")</script>';	

	  }
	  }
?> 






<?php	 

 include_once('server.php');
 
$query = "SELECT image FROM userclass_b";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
{

 echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" class="w3-round" style="width: 200px; height: 200px; margin-left: 200px">';
}
 	
?>







<!--<center><img src="usericon.png" alt="user" style="width: 200px; height: 200px">-->






  <!--upload button--><br>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
   <!-- <center><h4>Upload profile photo:</h4></center>-->
	<div style="margin-left:100px"><br>
    <input type="file" name="image" id="image">
    <input type="submit" value="submit" name="submit">
	</div>
</form>
<br>

<hr>


<center><h4>Upload exhibition photos:</h4></center>
 &nbsp;&nbsp;&nbsp;<img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px""><span>&nbsp;&nbsp;
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"></span>&nbsp;&nbsp;<span>
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px""></span>&nbsp;&nbsp;<span>
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px""></span>







