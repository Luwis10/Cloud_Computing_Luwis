<?php
require 'firebase_config.php';

$id = $_GET['id'];
$database->getReference("users/$id")->remove();
header("Location: view_data.php");
?>