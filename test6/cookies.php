<?php

echo "Welcome to the testing of cookies";


// sytax to set a cookie
setcookie("category", "Books", time() + 86400, "/");

echo "<br>The cookie is set";

?>