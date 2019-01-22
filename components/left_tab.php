<?php 

$trackNotResultSet = $user->getTrackNotification(); 




?>


 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
			
		

<?php if ($user->getUserType() !== 'C'){
	?>
		<li>
            <a href="#" data-toggle="modal" data-target="#basicModal1" class=" hvr-bounce-to-right">
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">New post</span> 
			</a>
        </li>
	
	
<?php } ?>

<?php if ($user->getUserType() == 'C'){
	?>
	<li>
            <a href="home.php"  class=" hvr-bounce-to-right">
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Feeds</span> 
			</a>
        </li>
	
		<li>
            <a href="#" data-toggle="modal" data-target="#basicModal1" class=" hvr-bounce-to-right">
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">International</span> 
			</a>
        </li>
	
	
<?php } ?>

		
		
		
		<li >
            <a href="#" data-toggle="modal" data-target="#basicModal2" class=" hvr-bounce-to-right" >
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Recommendation</span> 
				<?php 
					$result3 = $user->getRecommendations(); 
					if($user->getUnreadRecommendationsCount() > 0 )
					{echo '<span class="badge badge-primary">'.$user->getUnreadRecommendationsCount().'</span>';}?>

			</a>
        </li>

<?php if ($user->getUserType() !== 'C'){
	?>	<li>
            <a href="#" data-toggle="modal" data-target="#basicModal6" class=" hvr-bounce-to-right">
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Previous posts</span> 
			</a>
        </li>
		
<?php }?>
<li>
            <a href="sent.php"  class=" hvr-bounce-to-right">
				<i class="fa fa-envelope nav_icon "></i><span class="nav-label">Sent Messages</span> 
			</a>
        </li>
		<?php if ($user->getUserType() == 'C'){?>
		<li>
            <a href="#" data-toggle="modal" data-target="#basicModal9" class=" hvr-bounce-to-right">
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Tracked List</span> 
				<?php
	$num_of_new_track_notification = $trackNotResultSet->rowCount();
	if( $num_of_new_track_notification > 0){
		
		echo "<span class='badge badge-primary'>$num_of_new_track_notification</span>";
		
	}
	
}
?>
			</a>
        </li>


<?php if ($user->getUserType() == 'B'){?>

		<li>
            <a href="#" data-toggle="modal" data-target="#basicModal8" class=" hvr-bounce-to-right">
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Upload Media</span> 
			</a>
        </li>

<?php }?>		
		<li>
            <a href="#" data-toggle="modal" data-target="#basicModal5" class=" hvr-bounce-to-right">
				<i class="fa fa-heart nav_icon "></i><span class="nav-label">Favorites</span> 
			</a>
        </li>
	

<?php if ($user->getUserType() == 'C'){?>

		<li>
            <a href="#" data-toggle="modal" data-target="#basicModal8" class=" hvr-bounce-to-right">
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Upload Media</span> 
			</a>
        </li>

<?php }?>

<li>
            <a href="#" data-toggle="modal" data-target="#basicModal4" class=" hvr-bounce-to-right">
				<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Profile Settings</span> 
			</a>
        </li>


		
		</ul></div></div>