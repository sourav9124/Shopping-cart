<?php
include '../config.php';

if(isset($_GET['id']))
{


  $id=$_GET['id'];
  $sql="select * from product where id='$id'";

  $result=mysqli_query($conn,$sql);

  $row=mysqli_fetch_array($result);
  $extension='./images/';
  
  $name=$row['product_name'];
  $image=$extension.$row['product_image'];



  header('Content-type: application/force-download');
  header('Content-disposition: attachment; filename="'.basename($image).'"');
  header('Content-length: '.filesize( $image ));
  readfile($image);
  


}


?>
