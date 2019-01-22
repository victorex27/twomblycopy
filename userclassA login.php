<?php
session_start();
include_once('server.php');
include_once('user.php');


$error = false;
if(isset($_POST['btn-login'])){
	$username = trim($_POST['username']);
	$username = htmlspecialchars(strip_tags($username));
	
	$password = trim($_POST['password']);
	$password = htmlspecialchars(strip_tags($password));
	
	
	if(empty($username)){
		$error = true;
		$errorUsername = 'Please Input Username';
    }

    if(empty($password)){
	    $error = true;
        $errorPassword = 'Please Input Password';		
	}elseif(strlen($password)< 6){
		$error = true;
		$errorPassword = 'Password must be at least six characters';
	}	
		
	if(!$error){
		$password = md5($password);
		$sql = "select * from users where username='$username' AND user_type='A' ";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		if($count==1 && $row['password'] == $password){
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['type'] = 'A';
			
		    header('location: home.php');
		}else{
			$errorMsg = 'Invalid Username or Password';
		}
	}
		
}

?><!DOCTYPE html>
<html>
<head>
<title>User class A Log In</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w32.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
	<style>


html { 
  background: url(img/unsplash2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  color:white;
}




body{
	background: transparent;
	color:white;
	
}




</style>
</head>

<body>
    <div class="container">
	    <div style="width: 500px; margin-top: 100px; margin-left: 300px; background-color:transparent;">
		     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			     <center><h2>User class A Log In<h2></center>
				 <br>
				 <?php
				   if(isset($errorMsg)){
					?>
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-info-sign"></span>
                     <?php echo $errorMsg; ?>					 
                     </div>
                     <?php			 
				   }
				 ?>
				 <div class="form-group">
				   <label for="username" class="control-label">Username</label>
				   <input type="text" name="username" class="form-control" autocomplete="off">
				   <span class="text-danger"><?php if(isset($errorUsername)) echo $errorUsername; ?></span>
				 </div>
				 <div class="form-group">
				   <label for="password" class="control-label">Password</label>
				   <input type="password" name="password" class="form-control" autocomplete="off">
				   <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
				 </div>
				 <div class="form-group">
				     <input type="submit" value="Login" name="btn-login" class="btn btn-primary">
				 </div>
				  <p style="margin-left: 270px; margin-top: -47px">Need an account?&nbsp;<span><a class="btn btn-primary" href="user class A sign up.php">Sign Up</a></span></p>
			 </form>
		
		</div>
	</div>
</body>
</html>
