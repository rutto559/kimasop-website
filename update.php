<?php
$connection = new mysqli("localhost", "root", "", "my_database");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];

    $stmt = $connection->prepare("UPDATE details SET username=?, phonenumber=?, email=? WHERE id=?");
    $stmt->bind_param("sssi", $username, $phonenumber, $email, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Client updated successfully!'); window.location.href='connect.php';</script>";
    } else {
        echo "Error updating client: " . $stmt->error;
    }

    $stmt->close();
}
?>
