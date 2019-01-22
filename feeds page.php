<?php 
	$page = "home";
	include_once('components/header.php');
	
	
	$result = $user->getProfile();
	
	$result11 = "";
	
	
if(isset($_GET['post_id'])){

  $result11 = $user->getPostById($_GET['post_id']);

}else{
	$category = 'All';
	if(isset($_GET['submit'])){
		$category = $_GET['filter'];
		
	}

  $result11 = $user->getPosts($category);
}

	
	?>
	
	
	
		<?php include_once('components/left_tab.php'); ?>
		<div  id="page-wrapper" class="gray-bg dashbard-1">
		<div class="content-main">
		<div class="content-top">
		<div class="col-md-8 tab-content tab-content-in">
			
			

				<div class="" >
				
				<form  method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
				
				<div class="row">
						
						<div class="col-md-1"></div>
						
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
							
							<div class="col-md-3"><button type="submit" name="submit"  class="btn btn-primary button">SEARCH</button></div>
						
					
				</div>
				</form>
				<br>
				<?php 
				if( isset($_GET['successMsg']) && $_GET['successMsg']=='a'){ echo "<div class='row'><div class='col-md-1'></div><div class='col-md-3'><div id='op_succ'><span >Operation Successful</span></div></div></div>"; }
					include_once('components/modal.php');
					
					
					
				?>
				<table class="table"><tbody>
<?php 
  while($row = $result11->fetch(PDO::FETCH_ASSOC)){
extract($row);

if(isset($_GET['post_id'])){
  $user->updateTrack($row['user_id']);
}
?>
<tr class="table-row">
                            <td class="table-img">
                               <a href="viewprofile.php?user=<?php echo $user_id;?>" ><img style="width:100px; height:100px;" src="imageview.php?user=<?php echo $row['user_id']; ?>" alt="" /></a>
							   
                            </td>
                            <td class="table-text">
                            	<h6> <?php echo $title; ?></h6>
                                <p class="readmore" style="word-wrap: break-word; "><?php echo $message; ?>.</p>
                            </td>
                            <td>
                            	<span class="mar"><?php echo $category; ?></span>
                            </td>
                            <td class="march">
                                <?php echo $time; ?>
                            </td>
                          
                             <td >
                               	 
<!--<button   data-toggle="modal" data-target="#basicModal7" data-toggle="tooltip" title="Reply" class="reply w3-light-grey btn-circle text-align-center">-->
	<span>
		<i class="fa fa-black fa-reply fap reply" data-toggle="modal" data-target="#basicModal7" data-toggle="tooltip" title="Reply">
			<input type="hidden" value="<?php echo $post_id;?>" class="post_to_fav">
		
		</i></span>
		
		<!-- </button> -->
		<?php if ($user->getUserType() == 'C'){ ?>

	<span>
		<i class="fa <?php if($track != null){echo "fa-red"; }?>  fa-black fap fa-eye track_view_page" data-toggle="tooltip" title="Track"> <input type="hidden" value="<?php echo $user_id;?>" class="user_to_add"> </i></span>
		
<?php } ?>

	<span><i class="fa <?php if($fav != null){echo "fa-red"; }?> fa-black fa-heart fap add_to_fav_btn" data-toggle="tooltip" title="Favourite" ><input type="hidden" value="<?php echo $post_id;?>" class="post_to_fav"></i></span>
		
	

                            </td>
                        </tr>
						<tr><td>&nbsp;&nbsp; <?php echo $lastname." ".$firstname; ?></td></tr>

<?php }?>
</tbody></table>













</div>
				
				
				
				
				
				
				
				
				
				
				
				
			
		
		</div>
	
	
	
	
	
	</div>
	</div>
	</div>










<?php 
	
	include_once('components/footer.php');
	
?>