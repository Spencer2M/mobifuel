<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Mobi Fuel Admin Dashboard Orders</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
        width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

<html>
  <body>
    <center>
<img src="images/gas.png" height="70px">
      <h4>Mobi Fuel Admin Dashboard- Orders Map</h4></center>
    <?php require_once("menu.php"); ?>
    <div id="map"></div>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(0.3276818,32.6129364),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('ordersxml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var phone = markerElem.getAttribute('phone');
              var cartype = markerElem.getAttribute('cartype');
              var fueltype = markerElem.getAttribute('fueltype');
              var litres = markerElem.getAttribute('litres');
                var totalcost = markerElem.getAttribute('totalcost');
                var numberplate = markerElem.getAttribute('numberplate');
              var carcolor = markerElem.getAttribute('carcolor');
              var ordercode = markerElem.getAttribute('ordercode');
              var status = markerElem.getAttribute('status');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitude')),
                  parseFloat(markerElem.getAttribute('longitude')));



var htmlmine="<table><tr><td>Order Code</td><td>"+ordercode+"</td></tr></table>";




              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = "Ordecode :"+ ordercode+" <br> Cartype:"+cartype+" Numberplate :"+ numberplate+" Car Color :"+ carcolor+" \n Phone:"+phone+" \n Fuel Type:"+fueltype+" Litres :"+ litres+" \n Totalcost:"+totalcost+"";
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              





              //infowincontent.appendChild(htmlmine);
              //var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                title:ordercode,
                position: point               
              });
             marker.setMap(map);
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO_qOB3QyjIx4Jx-iQl0g3u6tdSCH_jKg&callback=initMap">
    </script>
  </body>
</html>