<?php
$id=$_GET['id'];
require_once("db.php");
$sql="DELETE from users where id='$id'";
$query=mysqli_query($conn,$sql);
if($query){
  echo '<script>alert("User Deleted Successfully"); window.location.assign("users.php");</script>';
}

 ?>