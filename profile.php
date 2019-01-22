<!DOCTYPE html>
<html>
<head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w32.css">
<script src="jquery.js"></script>
<script src="readmore.js"></script>
<style>

body {
     background-color:#F8F8F8 ;
	 margin: 0;
	 }

.nav{
  width:100%;
  background-color: #3399FF;
  overflow: auto;
	 
}

ul{
padding:0;
margin: 0;
list-style:none;
}

li{
float:left;
}

.red:link{
hover: blue;
width: 110px;
display:block;
padding:15px;
color:white;
text-decoration:none;
font-family:verdana;
font-size: 10px;
text-align: center;
text-transform: uppercase;
}

.red:hover {
   background-color:;
   color: black;
   }
   
.search{
margin-left: 350px;
width:400px;
padding: px;
border-radius:10px 10px 10px 10px;
border: none;
border:1px solid blue;
font-size:10px;
text-align:center;
margin-top:13px;
height:20px
}

a#red{
 text-decoration: none;
 color: blue;
 margin-left: 24px;
}

.thr:link{
width: 110px;
display:block;
padding-top: 10px;
padding-left: 10px;
color:white;
text-decoration:none;
font-family:verdana;
font-size: 18px;
text-align: center;
text-transform: uppercase;
font-family: lucida fax;
	}


</style>
</head>
<body>

<div class="w3-top">
<div class="nav">
 <ul>
 <li style="color: white"><a class="thr" href="">TWOMBLY</a></li>
 <input type="text" name="searchbox" class="search" placeholder="search here">
  <li style="float:right; color: white"><a class="red" href="logout.php">Log Out</a></li>
  <li style="float: right; color: white; padding-left: 5px"><a class="red" href="">Premium</a></li>
  <li style="float: right; color: white"><a class="red" href="companyloggedin.php">Dashboard</a></li>
	<li>
	
	</li>
  </ul>
</div>
</div>


<img src="usericon.png" class="w3-round" alt="Lagos" style="width:200px; height:200px; margin-top: 100px; margin-left: 400px">
<h4 style="margin-left: 650px; margin-top: -180px">Rating <span class="w3-badge w3-green">5</span> </h4>

<div style="width:200px; margin-left: 650px; margin-top: 20px">
 <h4>Rate this user &nbsp;</h4>
 </div>
 
 <div style="width: 185px; margin-left:790px; margin-top: -40px">
 <select class="w3-select w3-border" name="option">
  <option value="" disabled selected>Choose your rating</option>
  <option value="1"> 1</option>
  <option value="2"> 2</option>
  <option value="3"> 3</option>
  <option value="3"> 4</option>
  <option value="3"> 5</option>
</select>
</div>

<button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-border w3-light-grey w3-round" style="margin-left: 650px; margin-top: 20px">View Info</button>
<button class="w3-btn w3-border w3-light-grey w3-round" style="margin-left: 770px; margin-top: -63px">Add To Favorites</button>
<!--<button class="w3-btn w3-border w3-light-grey w3-round" style="margin-left: 940px; margin-top: -107px">Add To Favorites</button>-->
<br><br>
<button class="w3-btn w3-border w3-light-grey w3-round" style="margin-left: 650px; margin-top: -20px">Recommend</button>

<br><br>



<div id="id01" class="w3-modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-red w3-hidden w3-hide w3-padding-16 w3-display-topright">×</span>
  <div class="w3-modal-content w3-card-8 w3-animate-right" style="max-width:600px; height:px">

  <header>
    <header class="w3-container w3-blue"> 
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-closebtn">×</span>
     <center> <h2>User Details</h2></center>
    </header>
	<h4>Name</h4><br>
    <h4>Address</h4><br>
	<h4>Phone Number</h4><br>
	<h4>Email</h4><br>
	<p><h4>Website</h4><br>
	<h4>Dlogtype</h4><br>
	<!--&nbsp;<p><h4>Name</h4></p>-->
</div>
</div>













<!--slide show-->



<div class="w3-content" style="max-width:400px; max-height: 600px; margin-left: 530px">
  <img class="mySlides" src="images.png" style="width:300px; height: 300px">
  <img class="mySlides" src="images.png" style="width:300px; height: 300px">
  <img class="mySlides" src="images.png" style="width:300px; height: 300px">
</div>

<div class="w3-center" style="margin-left: 600px; margin-top: -100px">
  <div class="w3-section">
    <button class="w3-btn" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-btn" onclick="plusDivs(1)">Next ❯</button>
  </div>
  <button class="w3-btn demo" onclick="currentDiv(1)">1</button> 
  <button class="w3-btn demo" onclick="currentDiv(2)">2</button> 
  <button class="w3-btn demo" onclick="currentDiv(3)">3</button> 
</div>

<!--<div class="w3-card-12 w3-blue" style="width:200px; height:200px; margin-left: 30px; margin-top: -550px"><p>Hello World! include 'recent, previous and right now' later</p></div>-->





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


























</body>
</html>






