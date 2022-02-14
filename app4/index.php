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

$sql = "SELECT * FROM `test`";
$result = mysqli_query($conn,$sql);

// find the number of records returned
$num =  mysqli_num_rows($result);
echo $num."<br>";

// Display rows ret the sql query

// if($num > 0)
// {
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row); 
// }

// We can fetch in a better way by using a while loop
while ($row = mysqli_fetch_assoc($result))
{
    echo $row['sno']. " Hello ". $row['name']. " Welcome to ". $row['dest'];
    echo "<br>";
}


?>