<?php

session_start();
if(isset($_SESSION["logged_in"]))

{
   
	$data= $_SESSION["logged_in"]["fullname"];
	
	
	






require 'config.php';

$grand_total=0;
$allItems='';
$items=array();

$sql="SELECT CONCAT(product_name, '(',qty,')') AS ItemQty,total_price FROM cart";

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

while($row=$result->fetch_assoc())
{
	$grand_total+=$row['total_price'];
	$items[]=$row['ItemQty'];

}
$allItems=implode(", ",$items);
//echo $allItems;


 ?>

 

<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  
  <meta name="author" content="Sourav Singh">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Check Out</title>

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
	
	/*li{
		margin-right: 20px;
	}*/
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
        <a class="nav-link" href="./admin/admin_login.php"><?php echo "User ".$data;?></a>
      <li class="nav-item">
      	
        <a class="nav-link" href="index.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="checkout.php">Checkout</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart">
        	
        </i><sup class="badge badge-danger" id="cart-item"></sup></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link " href="./login_logout/logoff.php">Log Out</a>
      </li> 
      <li class="nav-item">
        <a href="cart.php" style="text-decoration: none;"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
      </li> 
    </ul>
  </div> 
</nav>


<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 px-4 pb-4" id="order">
			<h4 class="text-center text-info p-2">Complete Your Order!</h4>

			<div class="jumbotron p-3 mt-2 text-center"> </b>

				<h6 class="lead"><b>Product(s) : </b><?= $allItems;?></h6>

				<h6 class="lead text-danger">Delivery Charge :<b>Free</b></h6>
				<h5><b>Total Amount Payable :</b><?= number_format($grand_total,2) ?>/-</h5>


			</div>

			<form action="" method="post" id="placeOrder">
				<input type="hidden" name="products" value="<?= $allItems; ?>">
				<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">

				<div class="form-group">
					<input type="text" name="name" placeholder="Enter Name" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="email" name="email" placeholder="Enter email" class="form-control">
				</div>
				<div class="form-group">
					<input type="tel" name="phone" placeholder="Enter Phone number" class="form-control">
				</div>
				<div class="form-group">
					<textarea class="form-control" placeholder="Enter Delivery Address"
					 name="address"></textarea>
				</div>
				<h6 class="text-center lead">Select Payment Mode</h6>

				<div class="form-group">
					<select name="pmode" class="form-control" required>
						<option value="" selected-disabled>-Select Payment Mode-</option>
						<option value="cod">Cash On Delivery</option>
						<option value="netbanking">Net Banking</option>
						<option value="cards">Debit/Credit Card</option>
						
					</select>
					
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Place Order" 
					class="btn btn-danger btn-block">
				</div>
			</form>
		</div>
	</div>
	

	
</div>

  <script type="text/javascript" src="manage.js">
  	

  </script>




















</body>
</html>

<?php } ?>