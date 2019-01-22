<?php 
	$page = "home";
	include_once('components/header.php');
	
	
	$result = $user->getProfile();
	
	$result11 = $user->viewFavorites();
		
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
	if($result11->rowCount() < 1){ echo '<span>Favorites list is empty.</span>';}else{
  while($row = $result11->fetch(PDO::FETCH_ASSOC)){
extract($row);


?>
<tr class="table-row">
                            <td class="table-img">
                               
						
                            <img src="imageview.php?user=<?php echo $row['user_id'];?>" alt="usericon" class="w3-round" style="width: 50px; height: 50px">
							</td>
                            <td class="table-text">
                            	<?php echo $row['title'];?>
                            </td>
							<td class="table-text">
                            	<?php echo $row['message'];?>
                            </td>
                            <td class="table-text">
								<a href="home.php?post_id=<?php echo $row['post_id'];?>">View</a>
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