
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
        <a class="nav-link " href="index.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart">
        	
        </i><sup class="badge badge-danger" id="cart-item"></sup></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link " href="./login_logout/logoff.php">Log Out</a>
      </li>
      <li class="nav-item">
        <a href="index.php" style="text-decoration: none;"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
      </li> 
    </ul>
  </div> 
</nav>


<div class="container">

	<div class="row justify-content-center">
		<div class="col-lg-10">



			<div  style=
			"display:<?php if(isset($_SESSION['showAlert'])) 
			         {
			         	echo $_SESSION['showAlert'];}

			    else{
			    	echo 'none';
			    } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php if(isset($_SESSION['message'])) {echo $_SESSION['message'];}  unset($_SESSION['message']); ?></strong>
             </div>

			<div class="table-responsive mt-2">
				<table class="table table-bordered table-striped text-center">
                  
                   	<tr>
					
						<td colspan="7">
							<h4 class="text-center text-info m-0">Products in your cart!</h4>
						</td>
					

					</tr>
					<tr>

					
			            <td>Id</td>
			            <td>Image</td>
						<td>Product</td>
						
						<td>Price</td>
						<td>Quantity</td>
						<td>Total Price</td>
                        <td>
						<a href="action.php?clear=all" 
						class="badge badge-danger p-1" onclick="return confirm('Are You Sure Want To Clear Your Cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
						</td>
					

				</tr>

				</thead>

				<tbody>

					<?php

					require 'config.php';

					$stmt=$conn->prepare("SELECT * FROM cart");

					$stmt->execute();

					$result=$stmt->get_result();

				    $grand_total=0;
				    
                     // $i=0;
				    while($row=$result->fetch_assoc())
				    {
				    	// $i++;
				    	




					?>

					<tr>
					    <td><?= $row['id']; ?></td>
					    <input type="hidden" class="pid" value="<?= $row['id']; ?>">
						
						<td><img src="<?= $row['product_image'];?>"height="60rem" width="60rem"></td>
						<td><?= $row['product_name'];?></td>
						<td><i class="fas fa-rupee-sign"></i>&nbsp;<?=number_format($row['product_price'],2) ;?></td>
						<input type="hidden" class="pprice" value="<?= $row['product_price']?>">
						<td ><input type="number" class="form-control itemQty" 

							value="<?= $row['qty'];?>" style="width: 70px;"></td>

					    <td><i class="fas fa-rupee-sign"></i>&nbsp;<?=number_format($row['total_price'],2) ;?></td>

					    <td><a href="action.php?remove=<?=$row['id']; ?>" class="text-danger lead"onclick="return confirm('Are You Sure Want To Remove This Item?')"><i class="fas fa-trash-alt"></i></a></td>
					</tr>

					<?php  $grand_total+=$row['total_price'];  ?>



					<?php  }  ?>

					<tr>
						<td colspan="3">
							<a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
						</td>

						<td colspan="2"><h4>Grand Total</h4></td>
						<td><i class="fas fa-rupee-sign"></i>&nbsp;<strong><?=number_format($grand_total,2) ;?></strong></td>

						<td><a href="checkout.php" class="btn btn-info
							 <?= ($grand_total>1)?"":"disabled";?>">
							<i class="far fa-credit-card"></i>&nbsp;&nbsp;CheckOut</a></td>
					</tr>


					
				</tbody>
					
				</table>
			</div>
			
		</div>
	</div>
	
	

	
</div>

  <script type="text/javascript" src="manage.js">
  	

  </script>




















</body>
</html>

<?php 

}

 ?>