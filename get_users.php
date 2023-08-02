<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "info";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . " - " . $row["email"] . " - " . $row["number"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No users found";
}

$conn->close();
?>
