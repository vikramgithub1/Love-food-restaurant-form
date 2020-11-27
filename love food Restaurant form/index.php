<?php
$insert = false;
if (isset($_POST['name'])) {


    // set connection variable
    $server = "localhost";
    $username = "root";
    $password = "";
    // create a database connection
    $con = mysqli_connect($server, $username, $password);
    // check for connection success

    if (!$con) {
        die("connection to this databases failed due to" . mysqli_connect_errno());
    }
    // echo "Success connect to the database";

    // collect post variable
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $otherinfo = $_POST['otherinfo'];
    //  trip . trip database name (trip) and table name (.trip)
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gander`, `email`, `phone`, `otherinfo`, `date`) VALUES ('$name',
    '$age', '$gender', '$email', '$phone', '$otherinfo', CURRENT_TIMESTAMP());";

    // echo $sql;

    // execute the query
    if ($con->query($sql) == true) {
        // echo "sucessfully inserted";

        //flag for successful connection
        $insert = true;
    } else {
        echo "Error: $sql <br> $con->error";
    }
    // close the database connection 
    $con->close();
}

?>


//lovefood.html or php file index.php


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Restaurant form</title>
</head>

<body>
    <!-- <img src="" class="bg" alt="bg-image"> -->
    <div class="container">
        <h1>Welcome to L💖ve Food 🍲 Restaurant form</h1>
        <p>Enter your details and submit your form to conform in participation in the Love Food Restaurant</p>

        <!-- it's message when click submitting form then show on display in php -->
        <?php
        if ($insert == true) {
            echo "<p class='submsg'>Thank you submitting form. We are happy for the joining this L💖ve Food 🍲 Restaurant</p>";
        }

        ?>

        <!-- form  -->
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone">

            <textarea name="otherinfo" id="otherinfo" cols="30" rows="10" placeholder="enter your feedback"></textarea>
            <!-- <br> -->
            <button class="btn">submit</button>
            <!-- <button class="btn">reset</button> -->
        </form>

    </div>


    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gander`, `email`, `phone`, `otherinfo`, `date`) VALUES ('1', 'Kiya',
    '20', 'Male', 'kiya@gmail.com ', '9149170279', 'Hii kiya! How are you?', CURRENT_TIMESTAMP); -->

    <script src="index.js"></script>
</body>