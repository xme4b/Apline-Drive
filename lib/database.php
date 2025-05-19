<?php
// Database connection script
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'alpindrive';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

function insertCustomerData($conn , $firstname, $lastname, $birthdate, $driverLicenseNumber, $exhibitionDate, $expirationDate) {	
    $stmt = $conn->prepare("INSERT INTO `customer` (`id`, `firstname`, `lastname`, `birthday`, `driverLicenseNumber`, `exhibitionDate`, `expirationDate`) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $birthdate, $driverLicenseNumber, $exhibitionDate, $expirationDate);
    $stmt->execute();
    $stmt->close();
}

?>