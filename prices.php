<?php session_start(); require_once("menu.php"); 
require_once("db.php"); 

$sql="SELECT * from fueltypes where fueltype='Petrol'";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($query)){
$_SESSION['petrolprice']=$row['price'];



}


$sql1="SELECT * from fueltypes where fueltype='Diesel'";
$query1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_assoc($query1)){
$_SESSION['dieselprice']=$row1['price'];



}
?>

<center>
	
	<form action="prices.php" method="POST">
		<h3>Current Price of Petrol:</h3><input type="Number" name="petrolprice" value="<?php echo $_SESSION['petrolprice']; ?>" required="required" style="font-size: 18px; height: auto; width: 100%">
		<br>
		<h3>Current Price of Diesel:</h3> <input type="Number" name="dieselprice" value="<?php echo $_SESSION['dieselprice']; ?>" required="required" style="font-size: 18px; height: auto; width: 100%">
		<br><br>
		<input type="submit" name="updateprice" value="Update Prices" style="background-color: red; color: white;">
		
	</form>

	<?php
if (isset($_POST['updateprice'])) {
	# code...
$petrolprice=$_POST['petrolprice'];
$dieselprice=$_POST['dieselprice'];
$sq="UPDATE fueltypes set price='$petrolprice' where fueltype='Petrol'";
$insert=mysqli_query($conn,$sq);
if($insert){
   $sq1="UPDATE fueltypes set price='$dieselprice' where fueltype='Diesel'";
$insert1=mysqli_query($conn,$sq1);

if ($insert1) {
	# code...
	echo '<script> window.location.assign("prices.php");</script>';
}
}

}
	 ?>
</center>