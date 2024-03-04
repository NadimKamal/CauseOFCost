<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "eiduladha";

// Create connection
$conn = mysqli_connect( $servername, $username, $password, $database );

// Check connection
if ( !$conn ) {
    die( "Connection failed: ".mysqli_connect_error() );
} //end if
//echo "Connected successfully";
?>