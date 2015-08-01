<?php


function myConnection()
{
$servername = "localhost";
$username = "root";
$password = "123";
$databasename = "suvradip";

// Create connection
$con = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";

return $con;
}
?>