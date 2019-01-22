<?php
session_start();

if(!isset($_SESSION['username'])){
	
header('location:landingpage.php');
	
}



include_once('user.php');
$user = new User($_SESSION['id']);
if ($page == "message"){
	$user->upDateReadMessagesStatus();
}

$nameResult = $user->getProfile();



?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Twombly</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css2/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css2/style.css" rel='stylesheet' type='text/css' />
<link href="css1/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js2/jquery.min.js"> </script>
<script src="js2/bootstrap.min.js"> </script>
<script src="js2/jquery.js"></script>
  <script src="js/script1.js"></script>
  <script src="js/index.js"></script>
  <script src="js/readmore.js"></script>
<!-- Mainly scripts -->
<script src="js2/jquery.metisMenu.js"></script>
<script src="js2/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css2/custom.css" rel="stylesheet">
<script src="js2/custom.js"></script>
<script src="js2/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

<!----->


<!--skycons-icons-->
<script src="js2/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
<div id="wrapper">

<!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="home.php">Home</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" id="search_bar" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
			<div id="auto_list" style="width:60px; position:absolute; top:50px;  z-index:100;" ></div>
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
				
					<li class="dropdown at-drop">
		              <a href="#" data-toggle="tooltip" title="Premium" style="text-decoration:none;" >Premium  </a>
		              
		            </li>
		           
		    		<li class="dropdown at-drop">
		              <a href="messages.php" data-toggle="tooltip" title="Received Messages" ><i class="fa fa-envelope"></i> <?php $num_mess = $user->getNumUnreadMessages();if($num_mess > 0){ ?><span class="badge badge-primary"><?php echo $num_mess; ?></span><?php } ?></a>
		              
		            </li>
					<li class="dropdown at-drop">
		              <a href="sent.php" data-toggle="tooltip" title="Sent Messages" ><i class="fa fa-envelope"></i>  </a>
		              
		            </li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown">
					  <span class=" name-caret"><?php echo $nameResult['name']." ( TYPE ".$user->getUserType()." )"; ?><i class="caret"></i></span><img src="imageview.php?user=<?php echo $_SESSION['id']; ?>" class="imgFrame" alt="userfoto" style="width:80px; height: 80px; "></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="logout.php"><i class="fa fa-user"></i>Logout</a></li>
		                
		              </ul>
		            </li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	 </nav>