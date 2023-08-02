<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


 $servername = "localhost"; $username = "root";
 $password = "root"; $dbname = "info";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];

$sql = "INSERT INTO users (name, email, number) VALUES ('$name', '$email', '$number')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php"); 
?>
