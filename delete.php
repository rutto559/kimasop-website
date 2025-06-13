<?php
$connection = new mysqli("localhost", "root", "", "my_database");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $connection->prepare("DELETE FROM details WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Client deleted successfully!'); window.location.href='connect.php';</script>";
    } else {
        echo "Error deleting client: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No client ID provided.";
}
?>
