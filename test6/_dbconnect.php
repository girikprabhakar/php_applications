<?php
ini_set('display_errors', '0');

$insert = false;
$update = false;
$delete = false;

// Connect to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_STRICT);

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else
{
    echo "Connection established";
}


?>