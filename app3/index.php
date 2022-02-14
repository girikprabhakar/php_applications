<?php
echo "Welcome to the stage where we are ready to get connected to a database <br>";
/* 
Ways to connect to a MySQL Database
1. MySQLi extension
2. PDO
*/
// Connecting to the Database


$servername = "localhost";
$username = "root";
$password = "sad";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_STRICT);
// Create a connection
$conn = mysqli_connect($servername, $username, $password);


// echo "Connection was successful";

// // Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful";
}

?>