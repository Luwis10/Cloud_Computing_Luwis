<?php
require 'firebase_config.php';

$id = $_GET['id'];
$userRef = $database->getReference("users/$id");
$user = $userRef->getValue();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userRef->update([
        'name' => $_POST['name'],
        'age' => (int) $_POST['age'],
        'nationality' => $_POST['nationality'],
        'club' => $_POST['club']

    ]);

    header("Location: view_data.php");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <h2>Edit User</h2>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br><br>

        <label>Usia:</label>
        <input type="number" name="age" value="<?= htmlspecialchars($user['age']) ?>" required><br><br>

        <label>Negara:</label>
        <input type="text" name="nationality" value="<?= htmlspecialchars($user['nationality']) ?>" required><br><br>

        <label>Club:</label>
        <input type="text" name="club" value="<?= htmlspecialchars($user['club']) ?>" required><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="view_data.php">Kembali</a>
</body>

</html>