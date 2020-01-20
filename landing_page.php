<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  
  <meta name="author" content="Sourav Singh">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Shopping Cart</title>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style type="text/css">
	
	.main_div{

		margin-bottom: 0px;
	}
	img{
		height:30%;
	}
	.card_row{
		margin-left: 260px;
	}

	body{
		background: grey;
	}
	h1{
		font-size: 80px;
		color: #1fb5ac;
      }

     .footer{

     	width: 100%;
     	height: 150px;
     	margin-top: 20px;


            }

         .card-text{
         	color: #1fb5ac;
         }
	}

	.context-dark, .bg-gray-dark, .bg-primary {
    color: rgba(255, 255, 255, 0.8);
}

.footer-classic a, .footer-classic a:focus, .footer-classic a:active {
    color: #ffffff;
}
.nav-list li {
    padding-top: 5px;
    padding-bottom: 5px;
}

.nav-list li a:hover:before {
    margin-left: 0;
    opacity: 1;
    visibility: visible;
}

ul, ol {
    list-style: none;
    padding: 0;
    margin: 0;
}

.social-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 23px;
    font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
}
.social-container .col {
    border: 1px solid rgba(255, 255, 255, 0.1);
}
.nav-list li a:before {
    content: "\f14f";
    font: 400 21px/1 "Material Design Icons";
    color: #4d6de6;
    display: inline-block;
    vertical-align: baseline;
    margin-left: -28px;
    margin-right: 7px;
    opacity: 0;
    visibility: hidden;
    transition: .22s ease;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;Mobile Store</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
    	<li class="nav-item">
        <a class="nav-link active " href="landing_page.php">Home</a>
      </li>
    	<li class="nav-item">
        <a class="nav-link " href="./login_logout/registration.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./login_logout/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="index.php">Products</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="./admin/admin_login.php">Admin(Login)</a>
      </li> 
      <!-- <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart">
        	
        </i><sup class="badge badge-danger" id="cart-item"></sup></a>
      </li>  -->
    </ul>
  </div> 
</nav>
<div class="main_div" style="max-width:100%; ">
  <img class="mySlides w3-animate-top" src="images/10.jpg" style="width:100%">
  <img class="mySlides w3-animate-bottom" src="images/16.jpg" style="width:100%">
  <img class="mySlides w3-animate-top" src="images/14.jpg" style="width:100%">
  <img class="mySlides w3-animate-bottom" src="images/22.jpg" style="width:100%">
  <img class="mySlides w3-animate-bottom" src="images/15.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2500);    
}
</script>
<div class="jumbotron">
	
	<h1 style="text-align: center;">Explore here</h1>
</div>



<div class="row card_row">

<div class="row">
	<div class="col-sm-12 col-md-4 col-lg-4">
 <div class="card" style="width: 18rem;">
    <img src="images/slide2.jpg" class="card-img-top" alt="...">
 <div class="card-body">
   <p class="card-text">Despite the increasing ubiquity of screen displays—many of which offer an exceptionally high resolution, high-quality experience for the smartphone users.</p>
  </div>
</div>
		
	</div>

	<div class="col-sm-12 col-md-4 col-lg-4">
 <div class="card" style="width: 18rem;">
    <img src="images/slide4.jpg" class="card-img-top" alt="...">
 <div class="card-body">
   <p class="card-text">Advances have generally come in the form of incremental improvements to popular features that are now standard among manufacturers and models.</p>
  </div>
</div>
		
	</div>
	
	<div class="col-sm-12 col-md-4 col-lg-4">
 <div class="card" style="width: 18rem;">
    <img src="images/slide3.jpg " class="card-img-top " alt="...">
 <div class="card-body">
   <p class="card-text">More importantly, though, there are other signs and murmurs that smartphones are about to undergo a second renaissance over the next few years.</p>
  </div>
</div>
		
	</div>
	
	
</div>

</div>
<footer class="section footer-classic context-dark bg-image mt-3" style="background: #2d3246;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                <p style="color: white;">The website is smartphone shopping corner where buyers can trust the brand and the quality. </p>
                <!-- Rights-->
                <p class="rights"><span>@  </span><span class="copyright-year">2019</span><span> </span><span>Mobile Store</span><span>.</span></p>
              </div>
            </div>
            <div class="col-md-4">
              <h5 style="color: white">Contacts</h5>
              <dl class="contact-list">
                <dt >Address:</dt>
                <dd style="color: white">Lovely Professional University</dd>
              </dl>
              <dl class="contact-list">
                <dt>email:</dt>
                <dd><a href="mailto:#">souravsingh0021@gmail.com</a></dd>
              </dl>
              <dl class="contact-list">
                <dt>phones:</dt>

                <dd><a href="tel:#">+91 7978818256</a> <span>or</span> <a href="tel:#">+91 7504004515</a>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3">
              <h5>Information</h5>
              <ul class="nav-list">
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contacts</a></li>
                <li><a href="#">Pricing</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="https://www.facebook.com/profile.php?id=100009513270756&ref=bookmarks"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
          <div class="col"><a class="social-inner" href="https://www.google.com"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
          <div class="col"><a class="social-inner" href="https://www.google.com"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
          <div class="col"><a class="social-inner" href="https://www.google.com"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
        </div>
      </footer>







  <script type="text/javascript" src="manage.js">
  	

  </script>




















</body>
</html>