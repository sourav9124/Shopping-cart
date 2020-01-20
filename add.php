<?php

session_start();

if(isset($_SESSION["logged_in"]))
{


$data=$_SESSION["logged_in"]["fullname"];

//echo $data;


require 'config.php';


$msg="";
if (isset($_POST["submit"]))
 {
	$p_name=$_POST["pName"];
	$p_price=$_POST["pPrice"];
  $pCode=$_POST["pCode"];

	$target_dir="./images/";




	$target_file=$target_dir.basename($_FILES["pImage"]["name"]);
	move_uploaded_file($_FILES["pImage"]["tmp_name"],$target_file);

  $sql="INSERT INTO product(product_name,product_price,product_image,product_code)VALUES('$p_name','$p_price','$target_file','$pCode')";

  if(mysqli_query($conn,$sql))
  {
  	$msg="product added successfully";
  }
  else
  {
  	$msg="Failed to add the product.";
  }
}



?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="author" content="sourav singh">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width ,initial-scale=1 shrink-to-fit=no">
	<title>Add and Manage Mobile Store</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

     <style type="text/css">
     	.image{
 background-image: url(./images/add_background_img2.jpeg);
 
 background-size: cover;
}


 
     </style>

</head>
<body class="image">

	<!-- new nav bar -->

	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><h3><i>Mobile Store</i></h3></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  	<ul>
  		<span></span>
  		<span></span>
  	</ul>
    <ul class="navbar-nav mr-auto">
    	
    
      <!-- <li style="width: 300px; margin-right:15px; "><input type="text" class="form-control" id="search" name=""></li>
    	<li style=" margin-right:10px;"><input type="submit" class="btn btn-primary" id="serach_btn" name="" value="Search"></li> -->
      
    </ul>

    <ul class="navbar-nav ml-auto">
    	  <!-- <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-home">&nbsp;</i>Home</a>
      </li>
       -->
       
  

    	<li class="nav-item">
        <a class="nav-link" href="#" value=""><?= "Admin ".$data; ?></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="login_logout/logoff.php">Log Out</a>
      </li>


       
      
    </ul>
  </div> 
</nav>



	<div class="container">
		<span><div class="row ">
		<div class="col-md-5 bg-light mt-5  rounded bg-dark"  style="margin-right: 800px;">
			<h2 class="text-center p-2 text-secondary">ADD PRODUCT ONLINE</h2>
			<form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
				<div class="form-group">
					<input type="text" name="pName" class="form-control" placeholder="Product Name" required>
				</div>

				<div class="form-group">
					<input type="text" name="pPrice" class="form-control" placeholder="Product Price" required>
				</div>

				<div class="form-group">
					<div class="custom-file">
						<input type="file" name="pImage" class="custom-file-input" id="customFile"
						 required>

						 <label for="customFile" class="custom-file-label">Choose Product Image</label>
					</div>
				</div>
        <div class="form-group">
          <input type="text" name="pCode" class="form-control" placeholder="Product Code" required>
        </div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-success btn-block" value="Add">
				</div>
				<div class="form-group">
					<h4 class="text-center text-danger"><?= $msg; ?></h4>
				</div>
			</form>

		</div>
			
		</div>

		

</div>

<div class="col-md-3 p-4  bg-light rounded bg-dark" style="margin-left: 800px; margin-top:-350px;">

<div class="card" style="width: 21rem;">
  <img src="./images/12.jpg"  class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Manage Mobile Store</h5>
    <p class="card-text">From here admin can manage the mobile store and and can able to change and upload the products what user wants to purchase.</p>
    <a href="./admin_panel/index.php" class="btn btn-primary">Manage Store</a>
  </div>
</div>

		<!-- <div class="row justify-content-center">
			<div class="col-md-6 mt-3 p-4 bg-light rounded">
				<a href="product_page.php" class="btn btn-warning btn-block btn-lg">Go to product page</a>
			</div>
		</div> -->


		
	</div>

  

</body>
</html>

<?php } ?>

 
 