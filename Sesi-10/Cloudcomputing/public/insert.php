<?php
require 'firebase_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $nationality = $_POST['nationality'];
    $club = $_POST['club'];

    $newPostRef = $database->getReference('users')->push([
        'name' => $name,
        'email' => $email,
        'nationality' => $nationality,
        'club' => $club
    ]);

    echo "Data berhasil disimpan!";
}
?>

<h2>Tambah Data</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Nama" required><br>
    <input type="age" name="age" placeholder="Umur" required><br>
    <input type="text" name="nationality" placeholder="Negara" required><br>
    <input type="text" name="club" placeholder="Club" required><br>
    <button type="submit">Kirim</button>
</form>
<h2>Lihat Data</h2>
<a href="view_data.php">Lihat Semua Data</a>