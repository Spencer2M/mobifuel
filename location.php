<?php session_start(); ?>
<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Start up location</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="js/bootstrap.min.js"></script>
    <script>
    getLocation();

    </script>
</head>
<body style="text-align: center;">
    <!-- Image and text -->
<nav class="navbar navbar-light" style="background-color: #93caf1;">
        <a class="navbar-brand" href="#">
          <img src="images/gas.png" width="30" height="30" class="d-inline-block align-top" alt="">
         Mobi Fuel App
        </a>
      </nav>

      
<h5>Note:<br>Click the button to get your Location for Easy Delivery.</h5>

<button onclick="getLocation()" style="background-color: red; color:white; font-size: 20px; height: auto;">Locate Me</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  document.getElementById("latitude").value=position.coords.latitude;
  document.getElementById("longitude").value=position.coords.longitude;
  //localStorage.latitude=position.coords.latitude;
  //localStorage.longitude=position.coords.longitude;
}
function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}

function validate()
{
	if(document.getElementById('latitude').value=="")
	{
alert('please connect to the internet to pick your location');

	}

	//window.Location ='http://127.0.0.1/project/location.php';
}

</script>                                               


<form class="form-inline my-2 my-lg-0" onsubmit=" return validate()" action="request.php" method="POST">
    <input class="form-control mr-sm-2" name="latitude" id="latitude" required="required" type="text" placeholder="Latitude" readonly="readonly" value=""  />
     <input class="form-control mr-sm-2" name="longitude" required="required" id="longitude" type="text" placeholder="Longitude" readonly="readonly" value=""   />
    <button  class="btn btn-outline-success my-2 my-sm-0 " type="submit" name="Continue">Continue</button>
     </form>
     <hr>











    </body>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
    
    </html>