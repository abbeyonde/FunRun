<?php
    session_start();

    if (!isset($_SESSION["userid"])) {
        header("Location: login.html");
        exit();
    }

    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST["name"];
    $email = $_POST["email"];
    $icnumber = $_POST["icNum"];
    $phonenumber = $_POST["phoneNum"];
    $password = $_POST["pw"];
    $age = $_POST["age"];

    $userId = $_SESSION["userid"];

    $sql = "UPDATE users SET name='$name', email='$email', icnumber='$icnumber', phoneNum='$phonenumber', password='$password', age='$age' WHERE id='$userId'";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    $conn->close();
    ?>