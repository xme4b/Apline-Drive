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

function insertCustomerData($conn, $firstname, $lastname, $birthdate, $driverLicenseNumber, $exhibitionDate, $expirationDate, $email, $phonenumber)
{
    if (empty(getCustomerByEmail($conn, $email))) {
        $stmt = $conn->prepare("INSERT INTO `customer` (`id`, `firstname`, `lastname`, `birthday`, `driverLicenseNumber`, `exhibitionDate`, `expirationDate` , email, phonenumber) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $firstname, $lastname, $birthdate, $driverLicenseNumber, $exhibitionDate, $expirationDate, $email, $phonenumber);
        $stmt->execute();
        $stmt->close();
    }
    return null;
}

function getLoginData($conn, $username)
{
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $conn->close();
    return $user;
}

function updateConfirmation($conn, $id)
{
    $stmt = $conn->prepare("UPDATE reservationcar SET reservationIsConfirmed = 1 WHERE reservationcar.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

function getAllCustomerReservation($conn)
{
    $stmt = $conn->prepare("SELECT * FROM customer INNER JOIN reservationcar ON customer.id = reservationcar.ReservationCar_CustomerID WHERE reservationcar.reservationIsConfirmed = 0");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
}

function getCustomerByEmail($conn, $email)
{
    $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    if ($stmt->num_rows == 0) {
        return $data;
    }
    return null;
}

function getAllReservationCarByDates($conn, $beginDate, $endDate){
    $stmt = $conn->prepare("SELECT * FROM reservationcar WHERE beginDate = ? AND endDate = ?");
    $stmt->bind_param("ss", $beginDate, $endDate);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
}

function getAllReservationCarDates($conn){
    $stmt = $conn->prepare("SELECT * FROM reservationcar WHERE reservationIsConfirmed = 0");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
}

function insertReservation($conn, $firstname, $lastname, $email, $phonenumber, $beginDate, $endDate, $licensePlate)
{
    $format = 'd.m.Y H:i';
    $beginDate = DateTime::createFromFormat($format, $beginDate)->format('Y-m-d H:i:s');
    $endDate = DateTime::createFromFormat($format, $endDate)->format('Y-m-d H:i:s');

    $reservationCar = getAllReservationCarByDates($conn, $beginDate, $endDate);
    insertCustomerData($conn, $firstname, $lastname, "", "", "", "", $email, $phonenumber);
    if(!empty($reservationCar)){
        for ($i=0; $i < count($reservationCar); $i++) { 
            if($licensePlate == $reservationCar[$i]['licensePlate']){
                return "<button type='button' class='btn btn-danger'>Datum ist belegt!</button>";
            }
        }
    }

    $customer = getCustomerByEmail($conn, $email);
    $cusotmerID = $customer[0]['id'];

    $stmt = $conn->prepare("INSERT INTO reservationcar (id, beginDate, endDate, dateNow, ReservationCar_CustomerID, reservationIsConfirmed, licensePlate) VALUES (NULL, ?, ?, current_timestamp(), ?, 0, ?)");
    $stmt->bind_param("ssis", $beginDate, $endDate, $cusotmerID, $licensePlate);
    $stmt->execute();

    return "<button type='button' class='btn btn-warning'>Erfolgreich abgeschickt warten auf Bestätigung</button>";
}