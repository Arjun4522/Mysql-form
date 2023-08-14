<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // $tableName = $_POST['tableName'];
    //$numberOfColumns = intval($_POST['numberOfColumns']);
    //$columnNames = $_POST['columnNames'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tableName = $_POST['tableName'];
    $numberOfColumns = intval($_POST['numberOfColumns']);
    $columnNamesString = $_POST['columnNames'];

    // Convert the comma-separated string of column names into an array
    $columnNamesArray = array_map('trim', explode(',', $columnNamesString));

    // Rest of your code for creating the table

    // Now you can use the $columnNamesArray to iterate through column names
   // for ($i = 0; $i < $numberOfColumns; $i++) {
       // $columnName = $columnNamesArray[$i];
        // Use $columnName as needed




    // Database connection settings
    $servername = "localhost";
    $username = "mysql_username";
    $password = "mysql_password";
    $dbname = "db_name";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE $tableName (";

    for ($i = 0; $i < $numberOfColumns; $i++) {
        $columnName = $columnNamesArray[$i];
        $sql .= "$columnName VARCHAR(255)";

        if ($i != $numberOfColumns - 1) {
            $sql .= ",";
        }
   }
    $sql .= ");";

    if ($conn->query($sql) === TRUE) {
        echo "Table $tableName created successfully.";

        // Redirect to insert.php
        header("Location: insert.php?table=$tableName");
        exit();

    } else {
        echo "Error creating table $tableName: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

?>
