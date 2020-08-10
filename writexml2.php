<?php
include_once 'dbconnect.php';

// Start XML file, create parent node
//
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server


// Set the active MySQL database


// Select all the rows in the markers table
$sql = "SELECT * FROM markers WHERE 1";
$result = mysqli_query($conn,$sql);

$resultChecker = mysqli_num_rows($result);
if ($resultChecker > 0) {
// Iterate through the rows, adding XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  header("Content-type: text/xml");
    $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);

  $newnode->setAttribute("id", $row['Marker_ID']);
  $newnode->setAttribute("lng", $row['Long_tude']);
  $newnode->setAttribute("lat", $row['Lat_tude']);
  $newnode->setAttribute("Population", $row['Population']);
  $newnode->setAttribute("Disaster_Type", $row['Disaster_Type']);
  $newnode->setAttribute("Area_Affected", $row['Area_Affected']);
}
}

echo $dom->saveXML();
?>
