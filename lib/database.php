<?php
// Database connection script
$host = 'localhost';
$user = 'root';
$password = '';
$database = '';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

?>