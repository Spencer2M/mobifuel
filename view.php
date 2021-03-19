<?php session_start();
$ordercode=$_GET['ordercode'];
$id=$_GET['id'];
$phone=$_GET['phone'];
$cartype=$_GET['cartype'];
$fueltype=$_GET['fueltype'];

$carcolor=$_GET['carcolor'];
$litres=$_GET['litres'];
$totalcost=$_GET['totalcost'];

$numberplate=$_GET['numberplate'];

$status=$_GET['orderstatus'];
//echo $ordercode;



 ?>
<script type="text/javascript">
	const queryString = window.location.search;
console.log(queryString);
	const urlParams = new URLSearchParams(queryString);
	var latitude = urlParams.get('latitude');
	var longitude=urlParams.get('longitude');
	var ordercodee=urlParams.get('ordercode');
console.log(latitude);
</script>
 <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 350px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
 <body>
 	<center>

<img src="images/gas.png" height="70px">
 		<h3>Order Details</h3>
 	<?php require_once("menu.php"); ?></center>
<table  align="center" width="60%" border="1">
	
		<tr><td>Orde code</td><td><?php echo $ordercode; ?></td></tr>
		<tr><td>Phone Contact</td><td><?php echo $phone; ?> &nbsp; &nbsp; <a href="tel:<?php echo $phone ?>">Call</a></td></tr>
		<tr><td>Car Type</td><td><?php echo $cartype; ?></td></tr>
		<tr><td>Fuel Type</td><td><?php echo $fueltype; ?></td></tr>
		<tr><td>Car Color</td><td><?php echo $carcolor; ?></td></tr>
		<tr><td>Number Plate</td><td><?php echo $numberplate; ?></td></tr>
		<tr><td>Litres</td><td><?php echo $litres; ?></td></tr>
		<tr><td>Total Cost</td><td><?php echo $totalcost; ?></td></tr>
		<tr><td>Order Status</td><td><?php echo $status; ?>  &nbsp; &nbsp; <a href="deli.php?id=<?php echo $id ?>">Delivered</a></td></tr>
	
</table>
<hr>
<center><h4>Client Location</h4></center>


<div id="map"></div>
    <script>
//google maps for delivery agent
var laty=parseFloat(latitude);
var longy=parseFloat(longitude);
      function initMap() {
        var myLatLng = {lat:laty, lng: longy};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          animation: google.maps.Animation.BOUNCE,
          title: 'Order Code: '+ordercodee
        });

        var circle = new google.maps.Circle({
            center: myLatLng,
            map: map,
            radius: 100,          // IN METERS.
            fillColor: '#FF6600',
            fillOpacity: 0.3,
            strokeColor: "#FFF",
            strokeWeight: 0         // DON'T SHOW CIRCLE BORDER.
        });




      }

//end googlemaps
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO_qOB3QyjIx4Jx-iQl0g3u6tdSCH_jKg&callback=initMap">
    </script>


 </body>