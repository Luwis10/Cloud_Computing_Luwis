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
    $signInResult = $auth->signInWithEmailAndPassword($email, $password);
    echo "Login successful! User ID: " . $signInResult->firebaseUserId();
} catch (Exception $e) {
    echo "Login failed: " . $e->getMessage();
}
?>