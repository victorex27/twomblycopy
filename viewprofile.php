<?php
$page = "profile";
	include_once('components/header.php');
	$current_user = $_GET['user'];

$result = $user->viewProfilePage($current_user);

if( isset($_GET['read']) && $_GET['read'] == true){
	$user->updateRecommended($current_user);
	
}

 include_once('components/left_tab.php'); 
 ?>
 <input type="hidden" id="user" value="<?php echo $_GET['user'];?>">
	
        
        <div id="page-wrapper" class="gray-bg dashbard-1">
		
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
			
		   
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
				</h2>
		    </div>
		<!--//banner-->
		<!--content-->
		<!--gallery-->
		
 	 <div class=" profile">
		
		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Profile</h3>
			
			<div class="profile-bottom-top">
			
			<div class="col-md-4 profile-bottom-img">
				<img src="imageview.php?user=<?php echo $current_user; ?>" class="imgFrame img-responsive" alt="userfoto" style="width:150px; height: 150px; ">
				
			</div>
			<div class="col-md-8 profile-text">
				<h6><?php echo $result['name'];?></h6>
				<table>
				<tr><td>Mobile</td>  
				<td>:</td>  
				<td><?php echo $result['phonenumber'];?></td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><a href="<?php echo $result['email'];?>"><?php echo $result['email'];?></a></td>
				</tr>
				<tr>
				<td>Location</td>
				<td> :</td>
				<td><?php echo $result['location'];?></td>
				</tr>
				
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-bottom">
			<div class="col-md-3 profile-fo">
				
				
				<a href="#" data-toggle="modal" data-target="#basicModal20" data-toggle="tooltip" title="View" class="pro"><i class="fa fa-black fa-eye-slash"></i>View</a>
				
				
			</div>
			<div class="col-md-3 profile-fo">
		
				<a href="#" id="addtobookmark" class="pro1"><i class="fa <?php  if($result['bookmark'] != null){echo "fa-red"; }?> fa-black fa-bookmark"></i>Bookmark</a>
			</div>
			<div class="col-md-3 profile-fo">
				
				<a href="#" data-toggle="modal" data-target="#basicModal22"  data-toggle="tooltip" title="Recommend"><i class="fa fa-black fa-users"></i>Recommend</a>
			</div>
			<?php if($user->getUserType() == 'C'){ ?>
			<div class="col-md-3 profile-fo">
				
				<a href="#" id="track" data-toggle="tooltip" title="Track"  ><i id="i_track" class="fa fa-black fa-eye  <?php  if($result['track'] != null){echo "fa-red"; }?>"></i>Track</a>
			</div>
			<?php } ?>
			<div class="clearfix"></div>
			<br>
			
	 <div style="">
	 <span>
		
		<?php 
			$count = 1;
			$total = 5;
			$num_colored = $user->getRate($_GET['user']);
			$num_uncolored = $total - $num_colored;
			
				
				while($count <= $num_colored){
					echo "<button class='rate-user transparent-button blue-button' ><input type='hidden' class='star' value='$count'><i class='fa fa-star blue-button' style='color:blue;'></i></button>";
					$count++;
				}
				
				while($count <= $total){
					echo "<button class='rate-user transparent-button ' ><input type='hidden' class='star' value='$count'><i class='fa fa-star'></i></button>";
					$count++;
				}
				
				
				
				
			
		
		?>
		
		
	</span>
 
 
</div>
	
	
	
			</div>
			<div class="profile-btn">

               
	<?php 

if($user->getOtherUserType($current_user) == "B" || $user->getOtherUserType($current_user) == "C"){


  $result14 = $user->selectGalleryId($current_user);
  if ($result14->rowCount() > 0){
	  echo '<div class="row">
<div class="col-md-4"></div><div class="col-md-4">';

while($row3 = $result14->fetch(PDO::FETCH_ASSOC)){

    extract($row3);

  
?>
  

  <div class="gallery-img mySlides" >
 	 		<a href="getGalleryImage.php?id=<?php echo $id; ?>" class="b-link-stripe b-animate-go  swipebox"  title="Image Title" >
				 <img class="img-responsive " src="getGalleryImage.php?id=<?php echo $id; ?>" alt="" style="width:200px; height: 200px"/>   
					<span class="zoom-icon"> </span> </a>
			</a>
			</div>	
 	 		
  
  

<?php
   }
   ?>
   


<div class="w3-center" style="width: 200px">
  <div class="w3-section">
    <button data-toggle="tooltip" title="Previous" class="btn-circle w3-light-grey " onclick="plusDivs(-1)"><span><i class='fa fa-black fa-chevron-left'></i></span></button>
    <button data-toggle="tooltip" title="Next" class="btn-circle w3-light-grey " onclick="plusDivs(1)"><span><i class='fa fa-black fa-chevron-right'></i></span></button>
  </div>

</div>

<?php
 echo '</div>
   <div class="col-md-4"></div>
   </div>';
 }



 }
?>

           <div class="clearfix"></div>
		   
			</div>
			
			 
			
		</div>
		
		<div  id="page-wrapper" class="gray-bg dashbard-1">
				<div class="col-md-8 tab-content tab-content-in">
				
				<div class="content-main" >
					
					<table class="table"><tbody>
<?php 
	$result1 = $user->getPostsByCurrentUser($current_user);
  while($row = $result1->fetch(PDO::FETCH_ASSOC)){
extract($row);


?>
<tr class="table-row">
                           
                            <td class="table-text">
                            	<div>
									
									<p><?php echo time_elapsed_string($time); ?></p>
									<p><span class="mar"><?php echo $category; ?></span></p>
									<h2> <?php echo $title; ?></h2>
									<p class="readmore" style="word-wrap: break-word; "><?php echo $message; ?>.</p>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<span>
		<i class="fa fa-black fa-reply fap reply" data-toggle="modal" data-target="#basicModal7" data-toggle="tooltip" title="Reply">
			<input type="hidden" value="<?php echo $post_id;?>" class="post_to_fav">
		
		</i></span>
									</div>
									<div class="col-md-4">  
										<?php if ($user->getUserType() == 'C'){ ?>

	<span>
		<i class="fa <?php if($track != null){echo "fa-red"; }?>  fa-black fap fa-eye track_view_page" data-toggle="tooltip" title="Track"> 
		<input type="hidden" value="<?php echo $user_id;?>" class="user_to_add"> </i></span>
		
<?php } ?>
									</div>
									<div class="col-md-4">
									
									<span>
									<i class="fa <?php if($fav != null){echo "fa-red"; }?> fa-black fa-heart fap add_to_fav_btn" data-toggle="tooltip" title="Favourite" ><input type="hidden" value="<?php echo $post_id;?>" class="post_to_fav"></i></span>
		
	

                            </td>
                        </tr>
						

<?php ?>
									
									</div>
								</div>
                            </td>
                           
                          
                            
                        </tr>

<?php }?>
</tbody></table>

			
			
				</div>
				</div>
			
			
		<div class="clearfix"> </div>
		</div>
	</div>
	
		
			
		<!---->
		<script>
		
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].classList.remove("w3-red");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].classList.add("w3-red");
}
</script>

<link rel="stylesheet" href="css/swipebox.css">
	<script src="js/jquery.swipebox.min.js"></script> 
	    <script type="text/javascript">
			jQuery(function($) {
				$(".swipebox").swipebox();
			});
</script>


<?php 
					include_once('components/modal.php');
					
				
	include_once('components/footer.php');
	function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
	
?>  