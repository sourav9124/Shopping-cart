<?php
session_start();

if(isset($_POST['submit']))
{
   include('login_function.php');
   $status=input_recieved($_POST);

   if($status===true)
   {
   	 $status=validate_sanitize_inputs($_POST);
   	 if(is_array($status))
   	 {
   	 	//database part
   	 	include('login_database.php');

   	 	  $status=authenticate($status);
   	 	  if(is_array($status))
   	 	  {
   	 	  	$_SESSION["logged_in"]=$status;
          header("Location: ../index.php");

   	 	  }
   	 	  // else
   	 	  // {
   	 	  
   	 	  // }

   	 }
   	 else
   	 {
   	 	echo 'some error occured<br>';
   	 }
   }
   else
   {
   	echo"<script>alert('Missing Input Field!');</script>";
   }
}
if(isset($_POST['submit']))
{
    
     $email   =$_POST['email'];
     $password=$_POST['password'];
    
      if($email=="")
      {
	   	echo 'email field is empty<br>';
      }
      if($password=="")
      {
	   	echo 'password field cannot be blank<br>';
      }
}







  ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>

	<style type="text/css">
		.login_box{
			text-align: center;
			width:320px;
			height: 420px;
			background:#000;
			color:#fff;
			top: 54%;
			left: 50%;
			position: absolute;
			transform: translate(-50%,-50%);
			box-sizing: border-box;
		    opacity: 0.9; 



		
		}

	

		body{
			margin:0;
	        padding: 0;
	        width:300px;
	        height:600px;
	        background-image:url(images1/smartphone.jpg);
	        background-size:cover;
	        background-position: center;
	        font-family: sans-serif;
	        

		}
		.avatar{
			padding-top: 120px;

			width: 80px;
			height: 100px;
			border-radius: 50%;
			position: absolute;
			top: -50%;
			padding-right:400px;
			margin-top:-1px;
			margin-left:-50px;

		}
		h1{
			color:#4DB6AC;
      font-size: 30px;


		}
		h2{
			color: #4DB6AC;
      padding-top: 10px;

		}
        .login_box input[type="email"],input[type="password"]{
        	border:none;
        	border-bottom: 1px solid #fff;
        	background:transparent;
        	outline: none;
        	height:50px;
        	color: #fff;
        	font-size: 16px;
        }
        .login_box input[type="submit"]{
        	border:none;
        	outline:none;
        	height:40px;
        	width: 200px;
        	background:#fb2525;
        	color:#fff;
        	font-size: 18px;
        }
        
	</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div>
	<div class="login_box">
	<img src="images1/userlogo.png" class="avatar">

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<h1>LOG IN</h1>
    
	<h2>Email</h2>
	<input type="email" name="email" placeholder="email"><br>
	<h2>Password</h2>
    <input type="password" name="password" placeholder="password"></br><br>
    <input type="submit" name="submit" value="Login">
    
    </form>
    <span>
    <a href="registration.php">Register here</a>

    </span>
     <span>
    <a href="../landing_page.php" style="text-decoration: none;"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>

    </span>
    </div>
    </div>

</body>
</html>