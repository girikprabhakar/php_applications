<?php

// ini_set('display_errors', '0');
// $a = readfile("myfile.txt");
// echo $a;
// readfile("myfile.txt");

$fptr = fopen("myfile.txt", "r");


if (! $fptr) {
    die("Error: Could not open file 'myfile.txt'");
}




// echo fgets($fptr);
// echo fgets($fptr);

// Reading a file line by line
// while ($a = fgets($fptr)) {
//     echo $a;
// }
// echo "\nend of file";

// Reading a file character by character
// while ($a = fgetc($fptr)) {
//     echo $a;
//     // echo "hello";
// }
// echo "\nend of file";

// while ($a = fgetc($fptr)) {
//     if ($a == ".") {
//         break;
//     }
//     echo $a;
// }

// $content = fread($fptr,filesize("myfile.txt"));

// echo $content;

fclose($fptr);




?>