<!DOCTYPE html>
<html>
<head>
    <title>Insert Values</title>
</head>
<body>
    <h1>Insert Values into <?php echo $_GET['table']; ?></h1>
    <form action="" method="post">
        <?php
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

        $tableName = $_GET['table'];
        $sql = "DESCRIBE $tableName";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<label for='{$row['Field']}'>{$row['Field']}:</label>";
                echo "<input type='text' id='{$row['Field']}' name='values[{$row['Field']}]' required><br><br>";
            }
        } else {
            echo "Table $tableName not found.";
        }

        // Close the database connection
        $conn->close();
        ?>

        <input type="submit" value="Insert Values">
    </form>
        <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Reconnect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $insertValues = $_POST['values'];
        $columns = implode(", ", array_keys($insertValues));
        $values = "'" . implode("', '", $insertValues) . "'";

        $insertSql = "INSERT INTO $tableName ($columns) VALUES ($values)";
        if ($conn->query($insertSql) === TRUE) {
            echo "Values inserted into $tableName successfully.";
        } else {
            echo "Error inserting values into $tableName: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</body>
</html>
