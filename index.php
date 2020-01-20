
<?php

session_start();
if(isset($_SESSION["logged_in"]))

{
   
	$data= $_SESSION["logged_in"]["fullname"];
	
	
	




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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	/*body{
		background-color: gray;
	}*/
</style>
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
        <a class="nav-link" href="./admin/admin_login.php"><?php echo "User ".$data;?></a>
      </li> 
    	<!-- <li class="nav-item">
        <a class="nav-link " href="./login_logout/registration.php">Register Here</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>
      
      <!-- <li class="nav-item">
        <a class="nav-link" href="./admin/admin_login.php">Admin</a>
      </li>  -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="./admin/admin_login.php"><?php echo "Admin ".$data;?></a>
      </li>  -->
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart">
        	
        </i><sup class="badge badge-danger" id="cart-item"></sup></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link " href="./login_logout/logoff.php">Log Out</a>
      </li>
      <li class="nav-item">
        <a href="landing_page.php" style="text-decoration: none;"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
      </li> 
    </ul>
  </div> 
</nav>


<div class="container">
	
	<div id="message"></div>

	<div class="row mt-2 pb-3">


		<?php
		  include 'config.php';

		   $stmt=$conn->prepare('SELECT * FROM product');
		   $stmt->execute();
		   $result=$stmt->get_result();


		   while($row=$result->fetch_assoc())
		   {
		   	//print_r($row);




		?>


		<div class=" col-sm-6 col-md-4 col-lg-3">
			<div class="card-deck">
				<div class="card p-2 border-secondary mb-2">
					<img src="<?= $row['product_image']; ?>" class="card-img-top" height="250">

					<div class="card-body p-1">
						<h4 class="card-title text-center text-info">
							<?=  $row['product_name'];   ?>
 
							
						</h4>

						<h5 class="card-text text-center text-danger">
							<i class="fas fa-rupee-sign"></i><?= number_format($row['product_price'])?>/-
						</h5>
					</div>

					<div class="card-footer p-1">

						<form class="form-submit">
							<input type="hidden" class="pid" value="<?= $row['id'] ?>">
							<input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
							<input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
							<input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">

							<input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">

							<button class="btn btn-info btn-block addItemBtn">
								<i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add To Cart
							</button>
							
						</form>
			           
					</div>
				</div>
				
			</div>
			
		</div>

		<?php
             }
		?>
		
	</div>
	
</div>

  <script type="text/javascript" src="manage.js">
  	

  </script>




















</body>
</html>

<?php

}
?>