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

function getLoginData($conn, $username){
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $conn->close();
    return $user;
}

function updateConfirmation($conn, $id){
    $stmt = $conn->prepare("UPDATE reservationcar SET reservationIsConfirmed = 1 WHERE reservationcar.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

function getAllCustomerReservation($conn){
    $stmt = $conn->prepare("SELECT * FROM customer INNER JOIN reservationcar ON customer.id = reservationcar.ReservationCar_CustomerID WHERE reservationcar.reservationIsConfirmed = 0");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
}
?>

