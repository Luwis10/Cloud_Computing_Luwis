<?php
require __DIR__ . '/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Dotenv\Dotenv; // Pastikan ini ada

// Muat file .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Ambil credentials dari environment variable
$firebaseCredentialsPath = getenv('firebase_credentials.json');

if (!$firebaseCredentialsPath) {
    die("Firebase credentials not set in environment variables.");
}

// Decode JSON credentials
$serviceAccount = json_decode($firebaseCredentialsPath, true);
if (!$serviceAccount) {
    die("Invalid Firebase credentials.");
}

// Konfigurasi Firebase
$factory = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://cloud-computing-3e83d-default-rtdb.asia-southeast1.firebasedatabase.app'); // Ganti dengan URL database Anda

$database = $factory->createDatabase();
?>