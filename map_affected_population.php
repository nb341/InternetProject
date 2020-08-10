<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Affected Population</title>
<script type="text/javascript" src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyA5Tfpv2iAUjFHHhd__HFFgHJ3BtySGVIc&callback=initMap"></script>
<script type="text/javascript">

//function to get json file with the markers
function makeRequest(url, callback) {
var request;
if (window.XMLHttpRequest) {
request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
} else {
request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
}
request.onreadystatechange = function() {
if (request.readyState == 4 && request.status == 200) {
    callback(request);
}
}
request.open("GET", url, true);
request.send();
}
//variable to set up map and display
var map;

//positions map to the center of T&T
var center = new google.maps.LatLng(10.777730, -61.176800);

var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
//function to create and set up map
function init() {

var mapOptions = {
zoom: 9,
center: center,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
//prepares map to be displayed in map_canvas divider
map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
//gets json data
makeRequest('get_locations.php', function(data) {
//stores json objects in data variable
var data = JSON.parse(data.responseText);
//passes each marker stored in json object to be displayed on map
for (var i = 0; i < data.length; i++) {
    displayLocation(data[i]);
}
});
}
//display markers on map using info window
function displayLocation(location) {
//display marker info
var content =   '<div class="infoWindow"><strong>'  + location.Disaster_Type + '</strong>'
            + '<br/>'     + location.Area_Affected
            + '<br/>'     + location.Population + '</div>';

if (parseInt(location.Long_tude) == 0) {
geocoder.geocode( { 'Disaster Type': location.Disaster_Type }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {

        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location,
            title: location.Disaster_Type
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(content);
            infowindow.open(map,marker);
        });
    }
});
} else {
var position = new google.maps.LatLng(parseFloat(location.Lat_tude), parseFloat(location.Long_tude));
var marker = new google.maps.Marker({
    map: map,
    position: position,
    title: location.name
});
//show information attach to each marker when clicked on
google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(content);
    infowindow.open(map,marker);
});
}
}
</script>
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
     /* Set the size of the div element that contains the map */
     #map {
       height: 550px;  /* The height is 400 pixels */
       width: 100%;  /* The width is the width of the web page */
      }
   </style>
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
   //Dom manipulator for nav bar responsiveness
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</head>
  <body onload="init();">

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
    </div>
    <section id="main">
        <div id="map_canvas" style="width: 100%; height: 550px;"></div>
    </section>

  </body>
  </html>
