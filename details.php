<?php
include_once("config.php");

if(isset($_GET["details"]))

{
	$id=$_GET["details"];

	$sql="SELECT * FROM crud WHERE id=?";

	$stmt=$conn->prepare($sql);

	$stmt->bind_param("i",$id);

	$stmt->execute();

	$result=$stmt->get_result();

	$row=$result->fetch_assoc();


    


}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-danger">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 mt-5 " >
				<div class="jumbotron" style="width: 35rem; height: 30rem; 
				margin-left:6rem; ">
					
					<h1 class="text-center" style="margin-top: -3rem;">Profile Page</h1>

					<center><img class="img-thumbnail" src="<?= $row['photo']?>" style="width: 13rem; height: 12rem;"></center><p></p>

					<h4  style="width: 10rem; margin-left: 8rem;">Name :<?= $row['name']?></h4>
					<h4  style="width: 10rem; margin-left: 8rem;">Email :
					 <?= $row['email']?></h4>
					<h4  style="width: 10rem; margin-left: 8rem;">Phone :
					 <?= $row['phone']?></h4>


				</div>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>