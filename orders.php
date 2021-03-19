<?php session_start();

require_once("db.php");

 ?>
<html>
	
<body>
	<center>
<img src="images/gas.png" height="70px"><br>
<?php require_once("menu.php"); ?>
		<h3>Mobi Fuel-All Fuel Orders</h3></center>

<hr>
<div style="height: 500px; overflow: scroll;">
<table width="100%" border="1">
	<tr style="width: 100%; background-color: black;color: white;">
		<td>Order Code</td>
		<td>Contact Number</td>
		<td>Number Plate</td>
		<td>Car Type</td>
		<td>Car Color</td>
		<td>Fuel Type</td>
		<td>Litres</td>
		<td>Total Cost</td>
		<td>Order Status</td>
		<td>Action</td>
		
	
	</tr>
<?php
$sq="SELECT * from orders";
$sql=mysqli_query($conn,$sq);
while($row=mysqli_fetch_assoc($sql)){

$id=$row['id'];

 ?>

<tr>
		<td><?php echo $row['ordercode']; ?></td>
		<td><?php echo $row['phone']; ?></td>
		<td><?php echo $row['numberplate']; ?></td>
		<td><?php echo $row['cartype']; ?></td>
		<td><?php echo $row['carcolor']; ?></td>
		<td><?php echo $row['fueltype']; ?></td>
		<td><?php echo $row['litres']; ?></td>
		<td><?php echo $row['totalcost']; ?></td>
		<td><?php echo $row['status']; ?></td>
		<td><a href="view.php?id=<?php echo $id ?>&ordercode=<?php echo $row['ordercode'] ?>&phone=<?php echo $row['phone'] ?>&cartype=<?php echo $row['cartype'] ?>&fueltype=<?php echo $row['fueltype'] ?>&carcolor=<?php echo $row['carcolor'] ?>&litres=<?php echo $row['litres'] ?>&totalcost=<?php echo $row['totalcost'] ?>&numberplate=<?php echo $row['numberplate'] ?>&orderstatus=<?php echo $row['status'] ?>&latitude=<?php echo $row['latitude'] ?>&longitude=<?php echo $row['longitude'] ?>">view order</a></td>
		
		
	
	</tr>
<?php } ?>
</table>

</div>
</body>


</html>