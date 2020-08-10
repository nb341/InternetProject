<?php
//PDO is a extension which  defines a lightweight, consistent interface for accessing databases in PHP.
/*
$db=new PDO('mysql:dbname=odpm;host=localhost;','root','');
//here prepare the query for analyzing, prepared statements use less resources and thus run faster

$row=$db->prepare('SELECT * FROM markers WHERE Disaster_Time BETWEEN DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND CURDATE();');

$row->execute();//execute the query
$json_data=array();//create the array
foreach($row as $rec)//foreach loop
{
    $json_array['id']=$rec['Marker_ID'];
    $json_array['Disaster_Type']=$rec['Disaster_Type'];
    $json_array['Disaster_Time']=$rec['Disaster_Time'];
    $json_array['Area_Affected']=$rec['Area_Affected'];
    $json_array['Alert']=$rec['Alert'];
    $json_array['lng']=$rec['Lat_tude'];
    $json_array['lat']=$rec['Long_tude'];
//here pushing the values in to an array
    array_push($json_data,$json_array);

}

//built in PHP function to encode the data in to JSON format
echo json_encode($json_data);

*/

require 'db.php';

try {
    $password = "|<)cT6Ote]6R6/~l";
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    //returns true if more than zero rows are found in markers table between a time period
    //SELECT * FROM markers WHERE Disaster_Time BETWEEN DATE_SUB(CURDATE(), INTERVAL '88' HOUR) AND CURDATE();
    //SELECT * FROM markers WHERE DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= Disaster_Time;
    $sth = $db->query("  SELECT * FROM markers WHERE DATE_SUB(CURDATE(), INTERVAL 1 DAY) <= Disaster_Time;");
    //stores the rows found within time period
    $locations = $sth->fetchAll();
    //encodes data stored in locations as a json type and prints it
    echo json_encode( $locations );

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
