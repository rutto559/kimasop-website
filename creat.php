<?php 
$username = "";
$phonenumber = "";
$email = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $phonenumber = $_POST["phonenumber"];
    $email = $_POST["email"];

    if (empty($username) || empty($phonenumber) || empty($email)) {
        $errorMessage = "All the fields are required!";
    } else {
        // Normally you'd add to a database here
        // Simulating success for now
        $successMessage = "Client added successfully!";

        // Clear fields after success
        $username = "";
        $phonenumber = "";
        $email = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>New Client</h2>

    <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= $errorMessage ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (!empty($successMessage)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $successMessage ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($username) ?>">
        </div>

        <div class="mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" name="phonenumber" class="form-control" value="<?= htmlspecialchars($phonenumber) ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="connect.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
