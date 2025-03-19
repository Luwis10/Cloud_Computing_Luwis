<?php
require 'firebase_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $userProperties = [
            'email' => $email,
            'password' => $password,
        ];

        $createdUser = $auth->createUser($userProperties);

        // URL Redirect setelah user klik link verifikasi
        $actionCodeSettings = [
            'continueUrl' => 'http://localhost/cloud-computing/phpmailer/verify.php?email=' . urlencode($email),
            'handleCodeInApp' => false,
        ];

        $auth->sendEmailVerificationLink($email, $actionCodeSettings);

        // Simpan ke database
        $userData = [
            'email' => $email,
            'is_verified' => false
        ];

        $database->getReference('users/' . md5($email))->set($userData);

        echo "Registrasi berhasil! Cek email untuk verifikasi.";
    } catch (\Kreait\Firebase\Exception\AuthException $e) {
        echo "Error: " . $e->getMessage();
    }
}