<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // create a database connection
    $con = mysqli_connect($server, $username, $password);

    // check for connection success
    if (!$con){
        die("Could not connect to db".mysqli_connect_error());
    }
    

    // collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    
    $sql = "INSERT INTO `phpapp`.`app` (`name`, `age`, `gender`, `email`, `phone`, `other`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other');";

    // echo $sql;


    // execute the query
    if ($con->query($sql) == true) {
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }

    // close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PHP</title>
    <link rel="stylesheet" href="test.css">         
</head>
<body>
    <img class="bg" src="bg2.jfif" alt="University of Windsor">
    <div class="container">
        <h1>Reserach</h1>
        <p>Creating an application using PHP</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitmsg'>Thanks for submitting your form</p> ";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter name">
            <input type="text" name="age" id="age" placeholder="Enter age">
            <input type="text" name="gender" id="gender" placeholder="Enter gender">
            <input type="email" name="email" id="email" placeholder="Enter Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other info"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
