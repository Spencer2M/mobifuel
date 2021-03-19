<?php
$id=$_GET['id'];

require_once("db.php");
$sq="UPDATE orders set status='Delivered' where id='$id'";
$sql=mysqli_query($conn,$sq);
if($sql){
 echo '<script>alert("Order Set to Delivered"); window.location.assign("orders.php");</script>';
}else{
 echo '<script>alert("Operation Failed"); window.location.assign("orders.php");</script>';
}

 ?>