

<?php  include('../config.php'); ?>



<?php

session_start();
if(isset($_SESSION["logged_in"]))

{
   
  $data= $_SESSION["logged_in"]["fullname"];
  
  
  




?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>

        <!-- Latest compiled and minified CSS -->
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  		<!-- jQuery library -->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  		<!-- Popper JS -->
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  		<!-- Latest compiled JavaScript -->
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Admin Panel</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  
   <!--  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li> 
    </ul> -->

    
       
      
    </ul>
  </div>

  <!-- <form class="form-inline" action="#">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>  -->
  <div class="collapse navbar-collapse"  id="collapsibleNavbar">

  <ul class= "navbar-nav" style="margin-left:1050px; ">
      <li class="nav-item">
        <a class="nav-link" href="#" value=""><?= "Admin ".$data; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login_logout/logoff.php">Log Out</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../add.php"><i class="fas fa-arrow"></i>Back</a>
      </li>
    </ul>
</nav>

</div>


<div class="container-fluid">
	
	<div class="row justify-content-center">
		
		<div class="col-md-10">

			<?php

			$sql="SELECT * FROM product";
			$stmt=$conn->prepare($sql);
			$stmt->execute();
			$result=$stmt->get_result();


			?>

			<h3 class="text-center text-info">Record Present In The Database</h3>

			<table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        
        <th>Name</th>
        <th>Price</th>
        <th>Code</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>

    	<?php while($row=$result->fetch_assoc()){ 
        
        ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['product_name']; ?></td>
        <td><?= $row['product_price']; ?></td>
        <td><?= $row['product_code']; ?></td>
        <td>
        	<!-- <a href="details.php?details=<?= $row['id']?>" class="badge badge-primary p-2">Details</a> -->
        	<a href="action.php?delete=<?= $row['id']?>" class="badge badge-danger p-2"
        	  onclick="return confirm('Do you want to delete this record ?')">
          Delete</a>

          <a href="download.php?id=<?= $row['id']?>" class="badge badge-success p-2">
          Download</a>
        	

        	
      </tr>

  <?php  }?>
     
    </tbody>
  </table>
			
			
				
			
		</div>
	</div>
</div>

</body>
</html>


<?php 
}
 ?>