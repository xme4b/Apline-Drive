<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Reservation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
    <div class="reservation-container">
        <h2>Car Reservation</h2>
        <form id="reservationForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="carType">Car Type:</label>
                <select id="carType" required>
                    <option value="">Select</option>
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                    <option value="Truck">Truck</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pickupDate">Pickup Date/Time:</label>
                <input type="text" id="pickupDate" required>
            </div>
            <div class="form-group">
                <label for="returnDate">Return Date/Time:</label>
                <input type="text" id="returnDate" required>
            </div>
            <button type="submit">Make Reservation</button>
        </form>
        <div id="reservationSummary" style="display:none;">
            <h3>Reservation Summary</h3>
            <p id="summaryName"></p>
            <p id="summaryEmail"></p>
            <p id="summaryCarType"></p>
            <p id="summaryPickup"></p>
            <p id="summaryReturn"></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        const blockDates = "23.05.2025";

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize flatpickr for date/time pickers with disabled weekdays
            flatpickr("#pickupDate", {
                dateFormat: "d.m.Y H:i",
                minDate: new Date(),
                enableTime: true,
                time_24hr: true,
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