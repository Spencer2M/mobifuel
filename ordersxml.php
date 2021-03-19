<?php
require("db.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Select all the rows in the markers table
$query = "SELECT * FROM orders WHERE 1";
$result = mysqli_query($conn,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'phone="' . parseToXML($row['phone']) . '" ';
  echo 'cartype="' . parseToXML($row['cartype']) . '" ';
   echo 'numberplate="' . parseToXML($row['numberplate']) . '" ';
  echo 'latitude="' . $row['latitude'] . '" ';
  echo 'longitude="' . $row['longitude'] . '" ';
  echo 'fueltype="' . $row['fueltype'] . '" ';
  echo 'litres="' . $row['litres'] . '" ';
  echo 'totalcost="' . $row['totalcost'] . '" ';
  echo 'carcolor="' . $row['carcolor'] . '" ';
   echo 'ordercode="' . parseToXML($row['ordercode']) . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>