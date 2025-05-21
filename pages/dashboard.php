<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Vehicle Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            min-height: 100vh;
        }

        .card-stats {
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-stats .icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include_once("../lib/database.php");
    if (!isset($_SESSION['active'])) {
        header("Location: login.php");
    }
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./dashboard.php">Vehicle Dashboard</a>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="vehicleTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>License Plate</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <form action="./dashboard.php" method="post">
                                    <?php                                    
                                    $confimredID = isset($_POST['confirmedID']) ? $_POST['confirmedID'] : "";
                                    
                                    // check if the contet is empty
                                    if(!empty($confimredID)){
                                        updateConfirmation($conn, $confimredID);
                                    }
                                    
                                    $dataset = getAllCustomerReservation($conn);

                                    // output for the table content
                                    for ($i = 0; $i < count($dataset); $i++) {
                                        $begindate = new DateTime($dataset[$i]['beginDate']);
                                        $enddate = new DateTime($dataset[$i]['endDate']);

                                        echo "
                                            <tr>
                                            <td>" . $dataset[$i]['firstname'] . "</td>
                                            <td>" . $dataset[$i]['lastname'] . "</td>
                                            <td>" . $dataset[$i]['licensePlate'] . "</td>
                                            <td>" . $begindate->format("(d.m.Y) H:i") . " - " . $enddate->format("(d.m.Y) H:i") . "</td>
                                            <td><button name='confirmedID' value='" . $dataset[$i]['id'] . "'type='submit' class='btn btn-success'>Bestätige</button></td>
                                            <tr>
                                        ";
                                    }
                                    ?>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        // Simulated database data 
        let allData = [<?php // echo json_encode(getAllCustomerReservation($conn)) ?>];

        // Function to filter table data by date range
        function filterByDate() {
            const fromDate = document.getElementById('fromDate').value;
            const toDate = document.getElementById('toDate').value;
            const tableBody = document.getElementById('tableBody');

            // Validate date inputs
            if (!fromDate || !toDate) {
                alert('Please select both From and To dates.');
                return;
            }

            // Update table with filtered data
            let html = '';
            filteredData.forEach(row => {
                html += `
                <tr>
                    <td>${row.firstname}</td>
                    <td>${row.lastname}</td>
                    <td>${row.licensePlate}</td>
                    <td>${row.beginDate} - ${row.endDate}</td>
                </tr>
            `;
            });
            tableBody.innerHTML = html;
        }

        // Initialize table with all data on page load
        document.addEventListener('DOMContentLoaded', function() {
            let html = '';
            allData.forEach(row => {
                const formatter = new Intl.DateTimeFormat('de-DE', {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false, 
                    timeZone: 'Europe/Berlin'
                });

                html += `
                <tr>
                    <td>${row.firstname}</td>
                    <td>${row.lastname}</td>
                    <td>${row.licensePlate}</td>
                    <td>${formatter.format(new Date(row.beginDate))} - ${formatter.format(new Date(row.endDate))}</td>
                    <td><button name="confirmed" value="1" type="button" class="btn btn-success">Bestätige</button></td>
                </tr>
            `;
            });
            document.getElementById('tableBody').innerHTML = html;
        });
    </script> -->
</body>

</html>