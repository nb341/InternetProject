<?php
//xampp info
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "odpm";
//Creates connection between mariadb database and apache server for php pages to access data from odpm database
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    //error handling if database fails to connect
    if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
?>
