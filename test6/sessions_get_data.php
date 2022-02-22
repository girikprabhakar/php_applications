<?php


session_start();
if (isset($_SESSION['username']))
{
    echo "Welcome ". $_SESSION['username']." <br>";
    echo " category ". $_SESSION['favcat']."<br>";
    echo "Session started";
}

else {
    echo "Please log in to continue...";
}

?>