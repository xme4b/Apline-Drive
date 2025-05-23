<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Reservation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .reservation-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            height: 30px;
            margin-bottom: 10px;
            padding: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #reservationSummary {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        #reservationSummary p {
            margin-bottom: 5px;
        }

        /* Gray out Mondays and Tuesdays */
        .flatpickr-calendar .flatpickr-day.disabled,
        .flatpickr-calendar .flatpickr-day.disabled:hover {
            background-color: #f0f0f0 !important;
            /* Light Gray Background */
            color: #666666 !important;
            /* Dark Gray Text */
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <?php
    include_once("../lib/database.php");
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : "";
    $licensePlate = isset($_POST['carType']) ? $_POST['carType'] : "";
    $beginDate = isset($_POST['beginDate']) ? $_POST['beginDate'] : "";
    $endDate = isset($_POST['endDate']) ? $_POST['endDate'] : "";
    ?>
    <div class="reservation-container">
        <?php
        
        if (isset($_POST['submit'])) {
            insertReservation($conn, $firstname, $lastname, $email, $phonenumber, $beginDate, $endDate, $licensePlate);
            echo "<div class='alert alert-success' role='alert'>
                        Reservierung erfolgreich!
                    </div>";
        }
        ?>
        <h2>ALPINDRIVE Reservierung</h2>
        <form action="./kalender.php" method="post">
            <div class="form-group">
                <label for="name">Vorname:</label>
                <input name="firstname" type="text" id="firstname" required>
            </div>
            <div class="form-group">
                <label for="name">Nachname:</label>
                <input name="lastname" type="text" id="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phonenumber">Telefonnumer:</label>
                <input name="phonenumber" type="text" id="phonenumber" required>
            </div>
            <div class="form-group">
                <label for="carType">Car Type:</label>
                <select name="carType" id="carType" required>
                    <option value="">Select</option>
                    <option value="ZE-G80">M3 G80</option>
                    <option value="ZE-SKLASSE">S-Klasse</option>
                    <option value="ZE-CAYENE">Cayene</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pickupDate">Pickup Date/Time:</label>
                <input name="beginDate" type="text" id="pickupDate" required>
            </div>
            <div class="form-group">
                <label for="returnDate">Return Date/Time:</label>
                <input name="endDate" type="text" id="returnDate" required>
            </div>
            <button name="submit" type="submit">Make Reservation</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        const blockDates = "23.05.2025";

        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#pickupDate", {
                dateFormat: "d.m.Y H:i",
                minDate: new Date(),
                enableTime: true,
                time_24hr: true,
                disable: [
                    function(date) {
                        return (date.getDay() === 1 || date.getDay() === 2);
                    },
                    blockDates
                ],
                locale: {
                    firstDayOfWeek: 1
                }
            });
            flatpickr("#returnDate", {
                dateFormat: "d.m.Y H:i",
                minDate: new Date(),
                enableTime: true,
                time_24hr: true,
                disable: [
                    function(date) {
                        return (date.getDay() === 1 || date.getDay() === 2);
                    },
                    blockDates
                ],
                locale: {
                    firstDayOfWeek: 1
                }
            });
        });
    </script>

</body>

</html>