<!DOCTYPE html>
<html>
<head>
    <title>Web Version for MySQL</title>
</head>
<body>
    <h1>Add Data</h1>
    <form action="insert.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <input type="submit" value="Submit">
    </form>

    <h1>Users List</h1>
    <?php include 'get_users.php'; ?>
</body>
</html>
