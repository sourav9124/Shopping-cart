<?php



include('../config.php');

if(isset($_GET['delete']))
{

	 $id=$_GET['delete'];


	


	$sql="DELETE FROM product WHERE id=?";

	$stmt=$conn->prepare($sql);

	$stmt->bind_param("i",$id);	
	$stmt->execute();

	header('location:index.php');

}



 ?>