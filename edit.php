<?php
$connection = new mysqli("localhost", "root", "", "my_database");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $connection->query("SELECT * FROM details WHERE id = $id");

    if ($result->num_rows > 0) {
        $client = $result->fetch_assoc();
    } else {
        echo "Client not found.";
        exit();
    }
} else {
    echo "No ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Client</title>
</head>
<body>
    <h2>Edit Client</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $client['id'] ?>">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= $client['username'] ?>"><br><br>

        <label>Phone Number:</label><br>
        <input type="text" name="phonenumber" value="<?= $client['phonenumber'] ?>"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?= $client['email'] ?>"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
