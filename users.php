<?php session_start();

require_once("db.php");

 ?>
<html>
	
<body>
	<center>
<img src="images/gas.png" height="70px"><br>
<?php require_once("menu.php"); ?>
		<h3>Mobi Fuel-All Fuel Users</h3></center>

<hr>
<div style="height: 500px; overflow: scroll;">
<table width="100%" border="1">
	<tr style="width: 100%; background-color: black;color: white;">
		<td>E-Mail</td>
		<td>Password</td>
		<td>Userrole</td>
		
		<td>Action</td>
		
	
	</tr>
<?php
$sq="SELECT * from users";
$sql=mysqli_query($conn,$sq);
while($row=mysqli_fetch_assoc($sql)){

$id=$row['id'];

 ?>

<tr>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['password']; ?></td>
		<td><?php echo $row['userrole']; ?></td>
		
		<td><a href="deleteuser.php?id=<?php echo $id ?>">Delete User</a></td>
		
		
	
	</tr>
<?php } ?>
</table><br><br>
<form method="POST" action="users.php">
	Add New Admin User<br>
	<input type="email" name="email" required="required" placeholder="E-mail" style="width:100%;">
	<input type="password" name="password" required="required" placeholder="Password" style="width:100%;"><br><br>
	<hr>
	<input type="submit" name="adduser" value="Add User">

</form>
<?php
if(isset($_POST['adduser'])){
$email=$_POST['email'];
$password=$_POST['password'];
$sq="INSERT INTO `users` (`email`, `password`, `userrole`) VALUES ('$email', '$password', 'admin');";
$query=mysqli_query($conn,$sq);
if($query){
 echo '<script>window.location.assign("users.php");</script>';
}else{
	 echo '<script>alert("Failed Try Using another Email");</script>';
}
}

 ?>
</div>
</body>


</html>