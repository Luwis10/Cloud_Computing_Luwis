<?php
require __DIR__ . '/../vendor/autoload.php';

use Kreait\Firebase\Factory;

// Pastikan file firebase_credentials.json ada di current folder
$firebaseCredentialsPath = __DIR__ . '/firebase_credentials.json';

if (!file_exists($firebaseCredentialsPath)) {
    die("Firebase credentials file not found.");
}

// Konfigurasi Firebase
$factory = (new Factory)
    ->withServiceAccount($firebaseCredentialsPath)
    ->withDatabaseUri('https://cloud-computing-3e83d-default-rtdb.asia-southeast1.firebasedatabase.app'); // Ganti dengan URL database Anda

$database = $factory->createDatabase();
?>