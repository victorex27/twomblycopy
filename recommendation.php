<?php 
	$page = "home";
	include_once('components/header.php');
	
	
	$result = $user->getProfile();
	
	$result11 = $user->getRecommendations();
		
	?>
	
	
	
		<?php include_once('components/left_tab.php'); ?>
		<div  id="page-wrapper" class="gray-bg dashbard-1">
		<div class="col-md-8 tab-content tab-content-in">
			
			

				<div class="" >
				<?php 
					include_once('components/modal.php');
					
					if( isset($successMsg)){ echo "<span>$successMsg</span>"; }
					
				?>
				
				<br>
				<table class="table"><tbody>
<?php 
if($result11->rowCount() < 1){ echo '<span>You have no recommendations.</span>';}else{
  while($row = $result11->fetch(PDO::FETCH_ASSOC)){
extract($row);


?>
<tr class="table-row">
                            <td class="table-img">
                               
						
                            <a href = "viewprofile.php?user=<?php echo $user_id;?>"><img src="imageview.php?user=<?php echo $user_id;?>" alt="usericon" class="w3-round" style="width: 50px; height: 50px"></a>
							</td>
                            <td class="table-text">
                            	remommeded
                            </td>
                            <td class="table-img">
                            	<a href = "viewprofile.php?read=true&user=<?php echo $from_user;?>"><img src="imageview.php?user=<?php echo $from_user;?>" alt="usericon" class="w3-round" style="width: 50px; height: 50px"></a>
                            </td>
                            <td class="march">
                                <?php echo $time_created; ?>
                            </td>
                          
                           
                        </tr>

<?php }}?>
</tbody></table>













</div>
				
				
				
				
				
				
				
				
				
				
				
				
			
		
		</div>
	
	
	
	
	
	</div>










<?php 
	
	include_once('components/footer.php');
	
?>