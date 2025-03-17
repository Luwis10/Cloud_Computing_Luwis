<?php
require __DIR__ . '/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)->withServiceAccount(__DIR__ . '/firebase_credentials.json');
$auth = $factory->createAuth();

//Dummy Data
$email = "test@example.com";
$password = "pass123";

try {
    $user = $auth->createUserWithEmailAndPassword($email, $password);
    echo "User registered successfully: " . $user->vid;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>