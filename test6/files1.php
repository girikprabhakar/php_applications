<?php

$fptr = fopen("myfile1.txt", "c+");

if (! $fptr) {
    die("Could not open file");
}

// fwrite($fptr,"This is testing fwrite");

$content = fread($fptr, filesize("myfile1.txt"));
echo $content;

// $content = fread($fptr,filesize("myfile.txt"));

fclose($fptr);

?>