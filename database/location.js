
//var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
 // x.innerHTML = "Latitude: " + position.coords.latitude +
 // "<br>Longitude: " + position.coords.longitude;
  localStorage.latitude=position.coords.latitude;
  localStorage.Longitude=position.coords.longitude;

}
