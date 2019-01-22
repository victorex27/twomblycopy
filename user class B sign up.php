<?php
include_once('server.php');

 $error = false;
 if(isset($_POST['btn-register'])){
    // clean user input to prevent sql injection
	$firstname = $_POST['firstname'];
	$firstname = strip_tags($firstname);
	$firstname = htmlspecialchars($firstname);
	
	$lastname = $_POST['lastname'];
	$lastname = strip_tags($lastname);
	$lastname = htmlspecialchars($lastname);
	
	$phonenumber = $_POST['phonenumber'];
	$phonenumber = strip_tags($phonenumber);
	$phonenumber = htmlspecialchars($phonenumber);
	
	$address = $_POST['address'];
	$address = strip_tags($address);
	$address = htmlspecialchars($address);
	
	$location = $_POST['location'];
	$location = strip_tags($location);
	$location = htmlspecialchars($location);
	
    $username = $_POST['username'];
	$username = strip_tags($username);
	$username = htmlspecialchars($username);
	
	$email = $_POST['email'];
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
	
	$password = $_POST['password'];
	$password = strip_tags($password);
	$password = htmlspecialchars($password);
	
	
	
	//validate
	if(empty($firstname)){
	$error = true;
	$errorFirstname = 'Please Input First Name';	
	}
	
	if(empty($lastname)){
	$error = true;
	$errorLastname = 'Please Input Last Name';	
	}
	
	if(empty($username)){
	$error = true;
	$errorUsername = 'Please Input Username';	
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$error = true;
	$errorEmail = 'Please Input a valid email';	
	}		
	
	if(empty($password)){
	$error = true;
	$errorPassword = 'Please Input Password';	
	}elseif(strlen($password) < 6){
	$error = true;
	$errorPassword = 'Password must be at least 6 characters';
	}
	
	//encrypt password with md5
	$password = md5($password);
	
	//insert data if no errors
	if(!$error){
	    $sql = "insert into users(firstname, lastname, phonenumber, address, location, username, email, password,user_type)
	        values('$firstname', '$lastname', '$phonenumber', '$address', '$location', '$username', '$email', '$password', 'B')";	
	    if(mysqli_query($conn, $sql)){
            $successMsg = 'Registered Successfully. <a href="clientlogin.php">click here to login</a>';	
	     }else{
		     echo 'Error '.mysqli_error($conn);
	    }		
	}

 }
?>
<html>
<head>
<title>User class B Sign up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/w32.css">
<style>


html { 
  background: url(img/unsplash2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

body{
	background: transparent;
	color:white;
	
}





</style>
</head>
<body>
    <div class="container">
	    <div style="width: 500px; margin-top: 50px; margin-left: 300px";>
		     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			     <center><h2>User class A Sign Up<h2></center>
				 <br>
				 <?php
				    if(isset($successMsg)){
				?>
				       <div class="alert alert-success">
				       <span class="glyphicon glyphicon-info-sign"></span>
				       <?php echo $successMsg; ?>
				 </div>
				 <?php
				    }
				?>	
				
				 <div class="form-group">
				 <label for="username" class="control-label">Firstname</label>
				 <input type="text" name="firstname" class="form-control" autocomplete="off" required>
				 <span class="text-danger"><?php if(isset($errorFirstname)) echo $errorFirstname; ?></span>
				 </div>
				  <div class="form-group">
				 <label for="username" class="control-label">Lastname</label>
				 <input type="text" name="lastname" class="form-control" autocomplete="off" required>
				 <span class="text-danger"><?php if(isset($errorLastname)) echo $errorLastname; ?></span>
				 </div>
				  <div class="form-group">
				 <label for="username" class="control-label">Phone Number</label>
				 <input type="text" name="phonenumber" class="form-control" autocomplete="off" required>
				 </div>
				 <div class="form-group">
				 <label for="username" class="control-label">Address</label>
				 <input type="text" name="address" class="form-control" autocomplete="off" required>
				 </div>
				 <div class="form-group">
				 <label for="username" class="control-label">Location</label>
				 <input type="text" name="location" class="form-control" autocomplete="off" required>
				 </div>
				 <div class="form-group">
				 <label for="username" class="control-label">Username</label>
				 <input type="text" name="username" class="form-control" autocomplete="off" required>
				 <span class="text-danger"><?php if(isset($errorUsername)) echo $errorUsername; ?></span>
				 </div>
				 <div class="form-group">
				 <label for="username" class="control-label">Email</label>
				 <input type="email" name="email" class="form-control" autocomplete="off" required>
				 <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
				 </div>
				 <div class="form-group">
				 <label for="password" class="control-label">Password</label>
				 <input type="password" name="password" class="form-control" autocomplete="off" required>
				<span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
				 </div>
				 <div class="form-group">
				     <input type="submit" name="btn-register" value="create account" class="btn btn-primary">
				 </div>
				 <p style="margin-left:170px; margin-top: -50px">Already a member?<span><a class="btn btn-primary" href="user class B sign up.php">Log In</a><span></p>
				 <a class="btn btn-primary" style="margin-top:px; margin-left: px" href="landingpage.php">Back to Homepage</a>
			     <br>
			 </form>
		</div>	 

		</div>	 
</body>	

</html>		 


