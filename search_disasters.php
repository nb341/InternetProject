<?php
include_once 'dbconnect.php';
session_start();

 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Notices</title>
<div align="center"><a href="http://www.gov.tt" target="_blank"><img
src="http://67.23.224.218/images/govheader.jpg"
border="0" alt="Government of Trinidad and Tobago" style="max-height:96px;" />
</a>
</div>
<div align="center"><a href="http://www.gov.tt" target="http://localhost/InternetProject/index.php">
<img
src="banner_fit.jpg"
border="0" alt="Government of Trinidad and Tobago" style="max-height:96px;width:100%" />
</a>
</div>
<style>
body {margin:0;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  /*background-color: #4CAF50; */
  color: white;
}
.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
   <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<link rel="stylesheet" href="nav_bar.css">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 40%;
  padding: 10px;
}
.colum:after{
  float:left;
  width:60%;
  padding:10px;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
  <body>

    <div class="topnav" id="myTopnav">
      <a href="index.php" class="active">Home</a>
      <a href="Reports.php">Reports</a>
      <a href="Claims.php">Claims</a>
      <div class="dropdown">
        <button class="dropbtn"  onclick="window.location.href='Notices.php'">Notices
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="search_disasters.php">Search Notices By Disasters</a>
          <a href="search_by_locations.php">Search Notices By Locations</a>
          <a href="search_by_timestamp.php">Search Notices By Time Period</a>
          <a href="map_disasters.php">View Map of Disasters</a>
          <a href="map_bad_weather.php">View Map of Areas To Be Affected By Inclement Weather</a>
          <a href="map_affected_population.php">View Map of Population Affected By Disaster</a>
        </div>
      </div>
      <a href="Donations.php">Donations</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
&nbsp &nbsp
<div style="text-align:left;font-family: Helvetica Neue,sans-serif; background-color:#f7f7f7; color:#636363;">
<h2> Search BY: Disasters </h2>
<form action="search_disasters.php" method="get">
Disasters: <input type="text" name="disaster" value=""><br>

<input type="submit" value="Submit" style="background-color: black;
border: none;
color: white;
padding: 16px 32px;
text-align: center;
font-size: 16px;
margin: 4px 2px;
opacity: 0.6;
transition: 0.3s;
display: inline-block;
text-decoration: none;
cursor: pointer;">

</form>
&nbsp &nbsp
</div>
<div style="text-align:left;font-family: Helvetica Neue,sans-serif; background-color:#f7f7f7; color:#636363;">

<h2> <?php if(isset($_GET['disaster'])) echo "Results"; ?></h2>
<?php
 if(isset($_GET['disaster'])){
     $_Val = $_GET['disaster'];
$sql = "SELECT * FROM notices where Disaster_Type='".$_Val."';";
$result = mysqli_query($conn,$sql);
$resultChecker = mysqli_num_rows($result);
if ($resultChecker > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
     echo '<table>';
     echo '<tr>';
     echo "<td>Disaster Type: ".$row["Disaster_Type"]."</td>";
     echo '</tr>';
     echo '<tr>';
     echo "<td>Disaster Time: ".$row["Disaster_Time"]."</td>";
     echo '</tr>';
     echo '<tr>';
     echo "<td>Description: ".$row["Text_File"]."</td>";
     echo '</tr>';
     // header("Content-type: image/jpg");
     echo '<tr>';
     echo '<td>Media: </td>';
     echo '</tr>';
     echo '<tr>';
     //display picture if field not null
     if($row["Picture_File"]!=NULL){
     echo '<td><img src="'.$row["Picture_File"].'" style=height:400px; width:100px;/> </td>';
   }else{
        echo '<td>No pictures to display </td>';
   }
     echo '</tr>';
     echo '<tr>';
     //display video if field not null
     if($row["Video_File"]!=NULL){
      echo '<td><iframe width="720px" height="540px" src="'.$row["Video_File"].'"frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </td>';
      }
      else{
        echo '<td>No video to display</td>';
      }
     echo '</tr>';

      echo '</table>';
      echo '_____________________________________________________';
        }
     } else {
        echo "no results found";
     }
   }

       ?>
</div>
  </body>
  </html>
  <?php
  unset($_GET['disaster']);
  session_destroy();
  ?>
