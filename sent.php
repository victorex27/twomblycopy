<?php

$page = "message";
include_once('user.php');


include_once('components/header.php');

$user = new User($_SESSION['id']);





?>


<?php

$result99 = $user->getSentMessages();
 $result = $user->getProfile();
 
 
 
 ?>
<?php include_once('components/left_tab.php'); ?>
	
	<div  id="page-wrapper" class="gray-bg dashbard-1">
		<div class="col-md-8 tab-content tab-content-in">
			
			
		
		
			
			

				<div class="" >
				<?php 
					include_once('components/modal.php');
					
					if( isset($successMsg)){ echo "<span>$successMsg</span>"; }
					
				?>
				<table class="table"><tbody>
<?php 

if($result99->rowCount() < 1){ echo '<span>You have no sent message.</span>';}else{
  while($row = $result99->fetch(PDO::FETCH_ASSOC)){
extract($row);


?>






<tr class="table-row">
                            <td class="table-img">
                               <a href="viewprofile.php?user=<?php echo $user_id;?>" ><img style="width:100px; height:100px;" src="imageview.php?user=<?php echo $row['user_id']; ?>" alt="" /></a>
                            </td>
                            <td class="table-text">
                            	<h6> <?php echo $title; ?></h6>
                                <p class="readmore" style="word-wrap: break-word; "><?php echo $message; ?>.</p>
								<?php if($data && $mime == 'application/pdf'){ 
								echo "<a href='pdfview.php?pdf_id=$documents_id' target='_blank'>Read</a>";} ?>
                            </td>
                            
                            <td class="march">
                                <?php echo $time; ?>
                            </td>
                          
                           
                        </tr>

						
						
						
						
						
						







   
   






</div>
<br>

  <?php }}?>


</tbody></table>











</div>
				
				
				
				
				
				
				
				
				
				
				
				
			
		
		</div>
	
	
	
	
	
	</div>







</div>

</div>

<div class="modal fade" id="basicModal98" tabindex="-98" role="dialog" aria-labelledby="basicModal98" aria-hidden="true">
 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          ×
        </button>
		<h4 class="modal-title" id="myModalLabel">Reply Message </h4>
		<?php
include_once('server.php');

 $error = false;
 if(isset($_POST['submit'])){
    // clean user input to prevent sql injection
  $title = $_POST['title'];
  $title = strip_tags($title);
  $title = htmlspecialchars($title);
  
  $message = $_POST['message'];
  $message = strip_tags($message);
  $message = htmlspecialchars($message);
 
 
 //validate
  if(empty($title)){
  $error = true;
  $errorTitle = 'Please Input Title'; 
  }
  
  if(empty($message)){
  $error = true;
  $errorMessage = 'Please Input Proposal';  
  }
  
 
 }
 ?>
      </div>
      <div class="modal-body">
		<form action="post" method="">

   <input class="form-control" id="title" style="height: 40px" placeholder="enter title..." name="title" required />
    <span class="text-danger"><?php if(isset($errorTitle)) echo $errorTitle; ?></span>

   <br>
   
   <div class="post">

					<div class="text-area">
						<textarea class="form-control" id="message" style="height: 200px" placeholder="enter details..." name="message" value="message" required ></textarea>
					</div>
					<span class="text-danger"><?php if(isset($errorMessage)) echo $errorMessage; ?></span>
	
					<div class="post-at">
						
						<div class="text-sub">
							
							<button data-dismiss="modal" aria-label="Close" type="button" class="btn btn-secondary" style="margin-left: 05px">Cancel</button>
    <input id="post_message" type="submit" name="submit" data-dismiss="modal" aria-label="Close" value="submit" class="w3-btn w3-blue w3-curve w3-border">
    <input type="hidden" id="user_id_field"  >
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

  
  
   
      
    </div>
</form>
	

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
  </div>
  
  
  
  
  
  
  
  




<?php 
	
	include_once('components/footer.php');
	
?>