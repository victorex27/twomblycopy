
<div class="modal fade" id="basicModal1" tabindex="-1" role="dialog" aria-labelledby="basicModal1" aria-hidden="true">

<?php
  
   include_once('server.php');
  $user_id = $_SESSION['username'];
 
 
$error = false;
$successMsg = "";

?>
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel">New Post </h4>
		<?php
				    if(isset($successMsg)){
				?>
				       <div class="alert alert-success">
				       <span class="glyphicon glyphicon-info-sign" ></span>
				       <?php echo $successMsg; ?>
				 </div>
				 <?php
				    }
				?>
      </div>
      <div class="modal-body">
	  
	  
        
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"> 

 <div class="">
  <select class="form-control" style="" name="category" value="category" id="category" required>
  <option value="" disabled selected>Category</option>
  
  <?php 
	
	$cat  = $user->getCategory();
	
	for($i=0; $i < count($cat); $i++){
		
		echo "<option value='{$cat[$i]['id']}'>{$cat[$i]['name']}</option>";
		
		
	}
	
	
  ?>
</select>
<span class="text-danger"><?php if(isset($errorCategory)) echo $errorCategory; ?></span>
</div>
<br>

   <input class="form-control" style=" " placeholder="Title..." name="title"  id="title" required /><br/>
    <span class="text-danger"><?php if(isset($errorTitle)) echo $errorTitle; ?></span>
	

<div class="post">

					<div class="text-area">
						<textarea  class="form-control" style=" " placeholder="Enter Post..." name="message" value="message" id="message" required></textarea>
					</div>
					<span class="text-danger"><?php if(isset($errorMessage)) echo $errorMessage; ?></span>
	
					<div class="post-at">
						
						<div class="text-sub">
							
							<button type="button" class="btn btn-primary" name="submite" id="submit_post">Save changes</button>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

   

    
</form>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="basicModal2" tabindex="-2" role="dialog" aria-labelledby="basicModal2" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel"><a href="recommendation.php">Recommendation</a></h4>
		
      </div>
      <div class="modal-body">
       
		
		
		<?php 
		
		if($result3->rowCount() < 1){ echo '<span>You have no recommendations.</span>';}else{
		$count = 1;

	while(($row3 = $result3->fetch(PDO::FETCH_ASSOC) )&& ($count <= 5) ) {
		$count++;
		extract($row3);
?>


<br><br>
<div style="margin-top: -30px">
	
	<div class="row">
		<div class="col-md-2">
			<?php 
				//$user->viewProfilePage($current_user);
			?>
			<a href = "viewprofile.php?user=<?php echo $user_id;?>"><img src="imageview.php?user=<?php echo $user_id;?>" alt="usericon" class="w3-round" style="width: 50px; height: 50px"></a>
		<?php

		?>

		</div>
		<div class="col-md-5">
			<span>recommended: </span> <a href = "viewprofile.php?read=true&user=<?php echo $from_user;?>"><img src="imageview.php?user=<?php echo $from_user;?>" alt="usericon" class="w3-round" style="width: 50px; height: 50px"></a>
		</div>
		<div class='col-md-5'>
		<p style=" color: grey"><?php echo $time_created;?></p>
	</div>
	</div>
    
</div>
	<br>
		<?php }}
?>
	
		


  
	
	<br>
   

    

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>
  
  
  
  
  
  <div class="modal fade" id="basicModal3" tabindex="-6" role="dialog" aria-labelledby="basicModal3" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel">Repost </h4>
		
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  <div class="modal-body">
        
		



   
   <input type="text" id="repost_title" placeholder= "Title" class="form-control">
   <br/>
	
	
	
<div class="post">

					<div class="text-area">
						<textarea  class="form-control" style=" " placeholder="enter details..." name="message" value="message" id="repost_message" required></textarea>
					</div>
					<span class="text-danger"><?php if(isset($errorMessage)) echo $errorMessage; ?></span>
	
					<div class="post-at">
						
						<div class="text-sub">
							
							<button id="repost" class="btn btn-default">RE POST</button>	
							<button id="edit" class="btn btn-primary" >Edit</button>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

   

    

      </div>
      
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      
	

  
	
	
   

    

      </div>
      
    </div>
  </div>
  



<div class="modal fade" id="basicModal4" tabindex="-4" role="dialog" aria-labelledby="basicModal4" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel">Profile Settings </h4>
		
      </div>
      <div class="modal-body">
	  <input type="radio" name="options" value="picture"> Picture
	  <input type="radio" name="options" value="username"> Username
	  <input type="radio" name="options" value="email"> Email
	  <input type="radio" name="options" value="password"> Password
	  <input type="radio" name="options" value="mobile"> Mobile
	  <input type="radio" name="options" value="firstname"> First N.
	  <input type="radio" name="options" value="lastname"> Last N.
	  
	  <br>
	  <div class="update_div" id="update_pix_div">
		<div class="form-row" >
			<div class="col-md-10"><input type="file" accept="image/jpeg,image/jpg,image/png,image/gif" class="form-control-file" name="file" id="file"></div>
			<div class="col-md-2"><button class="btn btn-primary" id="uploadDpBtn" name="uploadDpB" >Update</button></div>
			<br/>
		<span id="msg_file"></span>
		
		</div>
		</div>

		
		 <div class="update_div" id="update_username_div">
		
		<div class="form-row " >
			<div class="col-md-2"><span>Username</span></div>
			<div class="col-md-8"><input type="text" id="username" class="form-control" value="<?php echo $result['username']; ?>" ></div>
			<div class="col-md-2"><button id="update_username" class="btn btn-primary" >Update</button></div>
			<span id="msg_username"></span><br/>
		</div>
		</div>
		
		 <div class="update_div" id="update_email_div">
		<div class="form-row" >
			<div class="col-md-2"><span>Email</span></div>
			<div class="col-md-8"><input class="form-control" type="email" id="email" value="<?php echo $result['email']; ?>" ></div>
			<div class="col-md-2"><button id="update_email" class="btn btn-primary" >Update</button></div>
			<span id="msg_email"></span><br/>
		</div>
		</div>

	

	 <div class="update_div" id="update_password_div">
	<div class="form-row" >
			<div class="col-md-2"><span>Password</span></div>
			<div class="col-md-8"><input type="password" id="password" class="form-control" ></div>
			<div class="col-md-2"><button id="update_password" class="btn btn-primary" >Update</button></div>
			<span id="msg_password"></span><br/>
		</div>
		</div>
		
	<div class="update_div" id="update_mobile_div">
	<div class="form-row" >
			<div class="col-md-2"><span>Mobile</span></div>
			<div class="col-md-8"><input type="number" id="mobile" class="form-control" value="<?php echo $result['phonenumber']; ?>"></div>
			<div class="col-md-2"><button id="update_mobile" class="btn btn-primary" >Update</button></div>
			<span id="msg_mobile"></span><br/>
		</div>
		</div>
		
		<div class="update_div" id="update_firstname_div">
	<div class="form-row" >
			<div class="col-md-2"><span>First N.</span></div>
			<div class="col-md-8"><input type="text" id="firstname" class="form-control" value="<?php echo $result['firstname']; ?>"></div>
			<div class="col-md-2"><button id="update_firstname" class="btn btn-primary" >Update</button></div>
			<span id="msg_firstname"></span><br/>
		</div>
		</div>
		
		<div class="update_div" id="update_lastname_div">
	<div class="form-row" >
			<div class="col-md-2"><span>Last N.</span></div>
			<div class="col-md-8"><input type="text" id="lastname" class="form-control" value="<?php echo $result['lastname']; ?>"></div>
			<div class="col-md-2"><button id="update_lastname" class="btn btn-primary" >Update</button></div>
			<span id="msg_lastname"></span><br/>
		</div>
		</div>
	
	

      </div><!-- modal body end-->
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>  
  
  
  
  
  <div class="modal fade" id="basicModal5" tabindex="-5" role="dialog" aria-labelledby="basicModal5" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel"><a href="favorite.php">Favorites</a></h4>
		
      </div>
      <div class="modal-body">
	  
<?php

	$result1 = $user->viewFavorites();
	if($result1->rowCount() < 1){ echo '<span>Favorites List is empty.</span>';}else{
	$count = 1;
	while( ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) && ($count <= 5)){
		$count++;
		extract($row1);
?>		 
<div style="padding:10px;">
<table class="table"><tbody>
<tr class="table-row fav">
                            <td class="table-img">
                               
						
                            <img src="imageview.php?user=<?php echo $row1['user_id'];?>" alt="usericon" class="w3-round" style="width: 50px; height: 50px">
							</td>
                            <td class="table-text">
                            	<?php echo $row1['title'];?>
                            </td>
							<td class="table-text">
                            	<?php echo $row1['message'];?>
                            </td>
                            <td class="table-text">
								<a href="home.php?post_id=<?php echo $row1['post_id'];?>">View</a>
							</td>
                            
                          
                           
                        </tr>
					</tbody></table>	
</div>
<hr>
<?php }}?>	

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
	
	  

      </div><!-- modal body end-->
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>
  
  
  
  
  
  <div class="modal fade" id="basicModal7" tabindex="-7" role="dialog" aria-labelledby="basicModal7" aria-hidden="true">
 <?php
 /*
include_once('server.php');

 $error = false;
    include_once('server.php');
  $user_id = $_SESSION['username'];
 
 
$error = false;


if(isset($_POST['submite'])){
	
	$category = $_POST['category'];
	
	
	$title = $_POST['title'];
	$title = strip_tags($title);
	$title = htmlspecialchars($title);
	
	
	$message = $_POST['message'];
	$message = strip_tags($message);
	$message = htmlspecialchars($message);
	
	
	//validate
	if(empty($category)){
	$error = true;
	$errorCategory = 'Please select category';	
	}
	
	if(empty($title)){
	$error = true;
	$errorTitle = 'Please Input Title';	
	}
	
	if(empty($message)){
	$error = true;
	$errorMessage = 'Please Input Message';	
	}
	
	
	
	
	 $sql = "insert into posts (category, title, message, user_id)
	          values('$category', '$title', '$message', '$user_id')";
			  
		if(mysqli_query($conn, $sql)){
			 echo '<script>alert("Post Uploaded Successfully")</script>';
            $successMsg = 'Successfully uploaded.';	
	     }else{
		     echo 'Error '.mysqli_error($conn);
	    }		
}
*/
 ?>
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
         ×
        </button>
		<h4 class="modal-title" id="myModalLabel">Reply Post </h4>
		
      </div>
      <div class="modal-body">
        
		
		<form id="form_submit" action="" method="post"  enctype="multipart/form-data">
		
		
		
   <input class="form-control" id="reply_title" style=" height: 40px" placeholder="enter title..." name="title" required />
    <span class="text-danger"><?php if(isset($errorTitle)) echo $errorTitle; ?></span>

   <br><br>
   
   <div class="post">

					<div class="text-area">
						<textarea class="form-control" id="reply_message"  placeholder="enter details..." name="message" value="message"></textarea>
					</div>
					<span class="text-danger"><?php if(isset($errorMessage)) echo $errorMessage; ?></span>
	
					<div class="post-at">
					
						<ul class="icon" style="visibility:<?php if($_SESSION['type'] !== 'C'){ echo "hidden";}?>">
							
							
							<div  class="post-file">
							<i class="fa fa-camera"></i>
							<input class="form-control-file" type="file" id="reply_file" name="file" style="visibility:<?php if($_SESSION['type'] !== 'C'){ echo "hidden";}?>">
  
							</div>
							
							
							<script>
							$(document).on('ready', function() {
								$("#reply_file").fileinput({showCaption: false});
							});
							</script>
							
						</ul>
					
						<div class="text-sub">
							
							<button  data-dismiss="modal" aria-label="Close" type="button" class="btn btn-secondary" style="">Cancel</button>
	  <input data-dismiss="modal" aria-label="Close" id="post_reply" type="submit" name="submit" value="submit" class="w3-btn w3-blue w3-curve w3-border" style="">
    <input type="hidden" id="post_id_field" >
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
	
	
    
</form>

    

      </div>
     
    </div>
  </div>
  </div>
  
  
  
  <div class="modal fade" id="basicModal20" tabindex="-20" role="dialog" aria-labelledby="basicModal20" aria-hidden="true">
 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		 <h4 class="modal-title" id="myModalLabel">User Info </h4>
		
      </div>
      <div class="modal-body">
 
		<h4><?php echo $firstname." ".$lastname;?></h4><br>
		<h4><?php echo $address;?></h4><br>
		<h4><?php echo $phonenumber;?></h4><br>
		<h4><?php echo $email;?></h4><br>
    

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>
 
 

<div class="modal fade" id="basicModal22" tabindex="-22" role="dialog" aria-labelledby="basicModal22" aria-hidden="true">
 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel">Bookmarks </h4>
		
      </div>
      <div class="modal-body" id="bookmark">
 
		<?php

  $result21 = $user->viewBookMarks();
  if($result21->rowCount() < 1){ echo '<span>Bookmark is empty.</span>';}else{
  while($row21 = $result21->fetch(PDO::FETCH_ASSOC)){

    extract($row21);
?>     
<div style="">
<img src="imageview.php?user=<?php echo $user_id;?>" alt="usericon" class="w3-round" style="width: 50px; height: 50px">
	<span> 
		<input type="hidden" class="to_id" value="<?php echo $user_id;?>">
		<button  class="recom btn btn btn-primary" style="">Recommend</button>
	</span>
</div>
<span id="msg"></span>
  
<?php
  }}
 ?> 

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>
   
  
  
  
  
  
  <div class="modal fade" id="basicModal8" tabindex="-8" role="dialog" aria-labelledby="basicModal8" aria-hidden="true">
 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel">Upload Gallery </h4>
		
      </div>
      <div class="modal-body">
 

		<div class="row">
		
			<div class="col-md-8">
				<input class="form-control-file" type="file" accept="image/jpeg,image/jpg,image/png,image/gif" name="file" id="file2" multiple="multiple">
	
			</div>
			<div class="col-md-4">
				<button class="btn btn-primary " id="gallery_upload" name="gallery_upload"  style="">Add to Gallery</button>

			</div>
		</div>
		
		
		<br/>
		<span id="msg_file"></span><br/>
		
		
	

			<div class="row big_div">
			
		
				
				<?php 
					
					$resAns = $user->selectGalleryId($_SESSION['id']);
					
					while($row = $resAns->fetch(PDO::FETCH_ASSOC)){
						
						extract($row);
						
						
						echo "<div class='col-md-4 col-xs-4 col-sm-4 gallery_div'>
						<button style='position:absolute; right:0px; width:30px; height:30px;' class='gallery_remove transparent-button'><input type='hidden' class='pix_id' value='$id'><i class='fa fa-times'></i></button>
							<img src='getGalleryImage.php?id=$id' alt='gallery' style='margin:0 5px 5px; margin-left:0; width:150px; height:150px;'>
						</div>";
						
					}
					
					
					
					
				
				?>


			</div>

		
	

	
	<br>
	














 
	
	<br>
   

    

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>
  
  
  
  
  
  


<br>



<div class="modal fade" id="basicModal9" tabindex="-9" role="dialog" aria-labelledby="basicModal8" aria-hidden="true">
 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel"><a href="tracked.php">Notification(Tracked Users) </a></h4>
		
      </div>
      <div class="modal-body">
 

		
		<?php
		if( $num_of_new_track_notification > 0){
			
			$count = 1;
			
			while( ($row5 = $trackNotResultSet->fetch(PDO::FETCH_ASSOC)) && ($count<= 5)){
				$count++;
				
				echo "<a href='?post_id=".$row5['post_id']."'><span><img src='imageview.php?user=".$row5['user_id']."' alt='profile picture' width='50' height='50'> has a new post.</span></a><br/>";
				
				
				
			}
		}else{
			echo '<span>No new notification.</span>';
		}
		?>
		
	
	














 
	
	<br>
   

    

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>
  
  
  
  
  
  
  
  



  
  
  
  
  
  
  
  
  
  
  <div class="modal fade" id="basicModal6" tabindex="-3" role="dialog" aria-labelledby="basicModal6" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel">Previous Posts</h4>
		
      </div>
      <div class="modal-body p_post">
	  
	
	

	
	<?php
		$user_post_id = $user->getPostIdOfUser();


		$num = count($user_post_id );
		
		

		echo "<input type='hidden' value='$num' id='num_of_user_post_id'>";
		

	
if($num <= 0){
	echo '<span>You have no previous post .</span>';
}
			
		else{
			$res = $user->getPost(1);

			while($row = $res->fetch(PDO::FETCH_ASSOC)){
			extract($row);

	?>
	<input type='hidden' id='user_post_id' value='<?php echo $post_id;?>' >
	<h6 id="post_time"><?php echo $time; ?></h6>
	<h6 id="post_category"><?php echo $category; ?></h6>
	<h2><p id="post_title"><?php echo $title; ?></p></h2>	
	
	
	<div class=" w3-light-grey w3-leftbar w3-border-grey" style="">
<p id="post_message"><?php echo $message; ?>.</p>
</div>
	
	<br>
	
<div class="row">
<div class="col-md-3"><button data-toggle="modal" data-target="#basicModal3"  data-dismiss="modal" aria-label="Close" class="w3-btn w3-light-grey w3-border w3-round" style="" id="editpost"><span><i class="fa fa-edit fa-black"></i></span></button>	
</div>
<div class="col-md-6"></div>
<div class="col-md-3"><button id="deletepost" class="w3-btn w3-light-grey w3-border w3-round" style=""><span><i class="fa fa-black fa-trash"></i></span></button></div>

</div>
	
	<hr>
	<div class="row">
	<div class="col-md-3"> <button class="w3-btn w3-light-grey w3-border w3-round" id="prev_post" style=""><span><i class="fa fa-black fa-angle-double-left"></i></span></button></div>
	<div class="col-md-6"></div>
	<div class="col-md-3"><button class="w3-btn w3-light-grey w3-border w3-round" id="next_post" style=""><span><i class="fa fa-black fa-angle-double-right"></i></span></button></div>
		
		
		<br>
		<br>


	</div>
	
	</div>
<?php
		}}
?>
</div>

      </div><!-- modal body end-->
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>
  
  
  
  

<script>
function myFunction() {
    document.getElementById("er").classList.toggle("w3-show");
}
</script>



<script>
function myCamel() {
    document.getElementById("Demo").classList.toggle("w3-show");
}
</script>
