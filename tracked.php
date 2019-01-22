<?php 
	$page = "home";
	include_once('components/header.php');
	
	
	$result = $user->getProfile();
	
	$result11 = $user->getAllTrackNotification(); 

;
		
	?>
	
	
	
		<?php include_once('components/left_tab.php'); ?>
		<div  id="page-wrapper" class="gray-bg dashbard-1">
		<div class="col-md-8 tab-content tab-content-in">
			
			

				<div class="" >
				
				<form  method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
				
				<div class="row">
					
						
							<div class="col-md-8"><select name="filter" class="form-control">
							
								<option value="" disabled selected>SELECT Category</option>
								<option value="All" >All</option>
  
								<?php 
	
									$cat  = $user->getCategory();
	
										for($i=0; $i < count($cat); $i++){
		
											echo "<option value='{$cat[$i]['id']}'>{$cat[$i]['name']}</option>";
		
		
										}
	
	
								?>
							</select></div>
							
							<div class="col-md-4"><button type="submit" name="submit"  class="btn btn-primary button">SEARCH</button></div>
						
					
				</div>
				</form>
				<br>
				<table class="table"><tbody>
<?php 
  while($row = $result11->fetch(PDO::FETCH_ASSOC)){
extract($row);


?>
<tr class="table-row">
                            
                            <td class="table-text">
                            	<?php echo "<a href='home.php?post_id=".$row['post_id']."'><span style='color:black;'><img src='imageview.php?user=".$row['user_id']."' alt='profile picture' width='50' height='50'> has a new post.</span></a><br/>";
				?>
                            </td>
							
                            
                          
                           
                        </tr>

<?php }?>
</tbody></table>













</div>
				
				
				
				
				
				
				
				
				
				
				
				
			
		
		</div>
	
	
	
	
	
	</div>










<?php 
	include_once('components/modal.php');
	include_once('components/footer.php');
	
?>