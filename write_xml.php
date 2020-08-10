<?php
 include_once 'dbconnect.php';

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server

$sql = "SELECT * FROM markers where 1";
$result = mysqli_query($conn,$sql);


header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
//  echo 'id="' . ($row['Marker_ID']) . '" ';
  echo 'lat="' . $row['Lat_tude'] . '" ';
  echo 'lng="' . $row['Long_tude'] . '" ';
  echo 'Population="' . $row['Population'] . '" ';
  echo 'Disaster Type="' . parseToXML($row['Disaster_Type']). '" ';
  echo 'Affected Areas="' . parseToXML($row['Area_Affected']) . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>
