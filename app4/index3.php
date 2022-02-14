<?php

ini_set('display_errors', '0');

$servername = "localhost";
$username = "root";
$password = "";
$database = "contacts";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_STRICT);
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}

$sql = "DELETE FROM `test` WHERE `dest` = 'test' LIMIT 2";
$result = mysqli_query($conn, $sql);

$aff = mysqli_affected_rows($conn);
echo "<br>Number of affected rows: $aff <br>";


if($result){
    echo "Deleted successfully";
}
else{
    $err = mysqli_error($conn);
    echo "Not Deleted successfully due to this error --> $err";
}


?>