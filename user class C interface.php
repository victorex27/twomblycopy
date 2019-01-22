<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:landing page.php');


 
	
}

 include_once('user.php');
  $user = new User($_SESSION['id']);



?>



<!DOCTYPE html>
<html>
<head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w32.css">
<script src="jquery.js"></script>
<script src="readmore.js"></script>
<link rel="stylesheet" href="css/w32.css">
<style>


html { 
  background: url(img/unsplash2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}



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

.red:link{
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
   color: black;
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

.thr:link{
width: 110px;
display:block;
padding-top: 10px;
padding-left: 10px;
color:white;
text-decoration:none;
font-family:verdana;
font-size: 18px;
text-align: center;
text-transform: uppercase;
font-family: lucida fax;
	}


</style>
</head>
<body>

<div class="nav">
 <ul>
 <li style="color: white"><a class="thr" href="">TWOMBLY</a></li>
 <input type="text" name="searchbox" class="search" placeholder="search here">
  <li style="float:right; color: white"><a class="red" href="logout.php">Log Out</a></li>
  <li style="float: right; color: white; padding-left: 5px"><a class="red" href="">Premium</a></li>
  <li style="float: right; color: white"><a class="red" href="companyloggedin.php">User Profile</a></li>
	<li>
	
	</li>
  </ul>
</div>


<?php

$result = $user->getProfile();
$trackNotResultSet = $user->getTrackNotification();
    
?>

<div style="margin-top: -50px">
<div style="margin-left:400px; margin-top: 100px ">
<img src="imageview.php?user=<?php echo $_SESSION['id'];?>" class="w3-round" alt="Lagos" style="width:200px; height:200px">
</div>
</div>



<div style="margin-left: 650px; margin-top: -195px">
<a href="feeds page.php" class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width: 200px">FEEDS</a>
<br><br>
<button class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width:200px"><span><img src="delivery.png" style="height:20px; width: 20px">&nbsp;&nbsp;********</button>
<br><br>
<button class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width: 200px">*******</button>
<br><br>
<a href='user class A & B recieved messages.php' class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width: 200px"><span><img src="bookmark.png" style="height:20px; width: 20px">&nbsp;&nbsp;Received Messages</a><span class="w3-badge w3-red"><?php echo $user->getPersonalPostMessages()->rowCount(); ?></span></p>
</div>
<h4 style="margin-left: 20px; margin-top: -240px"><?php echo $result['name']; ?> signed in as&nbsp;<b>USER CLASS C.</b></h4>

<!--<h4 style="margin-left: 20px; margin-top: 0px">********</h4>-->

<div style="margin-left: 450px; margin-top: 245px">
<button class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width:300px">Sent Messages</span></button>
<br><br>
<button onclick="document.getElementById('id11').style.display='block'" class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width:300px"><span><img src="eye.png" style="width:20px; height:20px">&nbsp;&nbsp; Tracked Users</span></button>
<?php
	$num_of_new_track_notification = $trackNotResultSet->rowCount();
	if( $num_of_new_track_notification > 0){
		
		echo "<span class='w3-badge w3-red'>$num_of_new_track_notification</span>";
		
	}
?>

<br><br>
<button  onclick="document.getElementById('ret').style.display='block'" class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width:300px"><span><img src="heart.png" style="width:20px; height: 20px">&nbsp;&nbsp;Favorites</span></button>
<br><br>
<button onclick="document.getElementById('id01').style.display='block'"  class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width:300px">Upload Media</span></button>
<br><br>
<button  onclick="document.getElementById('pset').style.display='block'" class="w3-btn w3-border w3-round-large w3-blue text-align-center" style="width:300px"><span><img src="wrench.png" style="width: 20px; height: 20px">&nbsp;&nbsp;Profile Settings</span></button><br>
<br><br>








<div id="id01" class="w3-modal">
 <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span>
 <div class="w3-modal-content w3-card-8 w3-animate-left" style="max-width:640px; height:800px">
   <header class="w3-container w3-blue" style="height:60px"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-closebtn w3-padding-top">×</span>
   <h2>Upload Media</h2>
  </header>
  <p>
 <center><img src="usericon.png" class="w3-round" alt="Lagos" style="width:170px; height:170px"></center>
  </p>
  <!--upload button-->
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <center><h4>Upload profile photo:</h4></center>
	<div style="margin-left:100px">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
	</div>
</form>
<br>
<hr>
<center><h4>Upload exhibition photos:</h4></center>
 &nbsp;&nbsp;&nbsp;<img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"><span>&nbsp;&nbsp;
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"></span>&nbsp;&nbsp;<span>
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"></span>&nbsp;&nbsp;<span>
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"></span>
  
 <hr>
<center><h4>Upload exhibition video clips</h4></center>
 &nbsp;&nbsp;&nbsp;<img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"><span>&nbsp;&nbsp;
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"></span>&nbsp;&nbsp;<span>
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"></span>&nbsp;&nbsp;<span>
 <img src="images.png" class="w3-round" alt="Lagos" style="width:140px; height:140px"></span>
  
  <br>
  <br>
  

  
</div>
</div>

<div id="pset" class="w3-modal">
  <span onclick="document.getElementById('pset').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-red w3-hidden w3-hide w3-padding-16 w3-display-topright">×</span>
  <div class="w3-modal-content w3-card-8 w3-animate-right" style="max-width:600px; height:px">
	
	
	
    <header class="w3-container w3-blue"> 
      <span onclick="document.getElementById('pset').style.display='none'" 
      class="w3-closebtn">×</span>
     <center><h2>Profile Settings</h2></center>
    </header>
	<div>
	<div class="w3-container">
		<!----><form action="" method="post" enctype="multipart/form-data"><!---->
		<img src="" alt="profile picture">
		<input type="file" accept="image/jpeg,image/jpg,image/png,image/gif" name="file" id="file">
	<button class="w3-btn w3-blue w3-round w3-border" id="uploadDpB" name="uploadDpB"  style="margin-left: 20px">Update</button>
<!----></form><!-- -->
		<br/>
		<span id="msg_file"></span><br/>
	<span>Username</span><input type="text" id="username" value="<?php echo $result['username']; ?>" >
		<button id="update_username" class="w3-btn w3-blue w3-round w3-border" style="margin-left: 20px">Update</button>
	<br/>
	<span id="msg_username"></span><br/>
	<span>Email</span><input type="email" id="email" value="<?php echo $result['email']; ?>" >
	<button id="update_email" class="w3-btn w3-blue w3-round w3-border" style="margin-left: 20px">Update</button><br/>
	<span id="msg_email"></span><br/>
	<hr/>
	<span>Password</span><input type="password" id="password"  >
	<button id="update_password" class="w3-btn w3-blue w3-round w3-border" style="margin-left: 20px">Update</button><br/>
	<span id="msg_password"></span><br/>
	
	</div>
	

	
	<br>
	
</div>
	
	<hr>

</div>	
</div>










	<div id="id11" class="w3-modal">
  <span onclick="document.getElementById('id11').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-red w3-hidden w3-hide w3-padding-16 w3-display-topright">×</span>
  <div class="w3-modal-content w3-card-8 w3-animate-right" style="max-width:600px; height:px">
	
	
	
    <header class="w3-container w3-blue"> 
      <span onclick="document.getElementById('id11').style.display='none'" 
      class="w3-closebtn">×</span>
     <center><h2>Notification(Tracked Users)</h2></center>
    </header>
	<div>
	<div class="w3-container">
		<!----><form action="" method="post" enctype="multipart/form-data"><!---->
		
		<?php
		if( $num_of_new_track_notification > 0){
			while($row5 = $trackNotResultSet->fetch(PDO::FETCH_ASSOC)){
				
				
				echo "<a href='feeds page.php?post_id=".$row5['post_id']."'><span><img src='imageview.php?user=".$row5['user_id']."' alt='profile picture' width='50' height='50'> has a new post.</span></a><br/>";
				
				
				
			}
		}
		?>
		
	
	</div>
	

	
	<br>
	
</div>
	
	<hr>

</div>	
</div>
<br/>










<div id="ret" class="w3-modal">
  <span onclick="document.getElementById('ret').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-red w3-hidden w3-hide w3-padding-16 w3-display-topright">×</span>
  <div class="w3-modal-content w3-card-8 w3-animate-right" style="max-width:600px; height:px"> 
  
  

    <header class="w3-container w3-blue"> 
      <span onclick="document.getElementById('ret').style.display='none'" 
      class="w3-closebtn">×</span>
     <center><h2>Favorites</h2></center>
    </header>


	<div class="w3-container">
<br><br>
<?php

	$result1 = $user->viewFavorites();
	while($row1 = $result1->fetch(PDO::FETCH_ASSOC)){

		extract($row1);
?>		 
<div style="margin-top: -30px">
<img src="usericon.png" alt="usericon" class="w3-round" style="width: 50px; height: 50px"<span><a href="profile view page.php?&user=<?php echo $post_id;?>" class="w3-btn w3-blue w3-round w3-border" style="margin-top: -30px">View Profile</a></span>
</div>
	<br><br><br>
<?php }?>	

</div>
</div>
	<br>
	
	
	
	

	
	
	
<?php
	

if(isset($_POST['uploadDpB'])){


/* Getting file name */
$uploaddir = 'tmp/';
$uploadfile = $uploaddir .$_SESSION['id']. basename($_FILES["file"]["name"]);



if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile)) 
{


echo $user->changeProfilePicture($uploadfile,$_FILES['file']['type']);
unlink($uploadfile);
}



			  	
}

?>


</body>

</html>
