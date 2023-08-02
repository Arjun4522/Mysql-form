<!DOCTYPE html>
<html>
<head>
    <title>Basic LAMP stack</title>
</head>
<body>
    <h1>Enter Data</h1>
    <form action="insert.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="number">Phone:</label>
        <input type="text" name="number" required>
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>

    <h1>Users List</h1>
    <?php include 'get_users.php'; ?>
</body>
</html>
