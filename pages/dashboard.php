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
    if (!isset($_SESSION['active'])) {
        header("Location: login.php");
    }
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Vehicle Dashboard</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Navigation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Vehicle Entries</h5>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <input type="date" id="fromDate" class="form-control" placeholder="From Date">
                            </div>
                            <div class="col-md-4">
                                <input type="date" id="toDate" class="form-control" placeholder="To Date">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" onclick="filterByDate()">Filter</button>
                            </div>
                        </div>
                    </div>
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
                                <!-- Simulated Database Data -->
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>ABC123</td>
                                    <td>2023-03-01</td>
                                </tr>
                                <tr>
                                    <td>Jane</td>
                                    <td>Smith</td>
                                    <td>DEF456</td>
                                    <td>2023-03-05</td>
                                </tr>
                                <tr>
                                    <td>Bob</td>
                                    <td>Johnson</td>
                                    <td>GHI789</td>
                                    <td>2023-03-10</td>
                                </tr>
                                <tr>
                                    <td>Alice</td>
                                    <td>Williams</td>
                                    <td>JKL012</td>
                                    <td>2023-03-15</td>
                                </tr>
                                <!-- End Simulated Data -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulated database data 
        let allData = [{
                firstname: "John",
                lastname: "Doe",
                licensePlate: "ABC123",
                date: "2023-03-01"
            },
            {
                firstname: "Jane",
                lastname: "Smith",
                licensePlate: "DEF456",
                date: "2023-03-05"
            },
            {
                firstname: "Bob",
                lastname: "Johnson",
                licensePlate: "GHI789",
                date: "2023-03-10"
            },
            {
                firstname: "Alice",
                lastname: "Williams",
                licensePlate: "JKL012",
                date: "2023-03-15"
            },
            {
                firstname: "Alice",
                lastname: "Williams",
                licensePlate: "JKL012",
                date: "2023-03-15"
            },
        ];

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

            // Filter data based on selected date range
            const filteredData = allData.filter(row => {
                const rowDate = new Date(row.date);
                return rowDate >= new Date(fromDate) && rowDate <= new Date(toDate);
            });

            // Update table with filtered data
            let html = '';
            filteredData.forEach(row => {
                html += `
                <tr>
                    <td>${row.firstname}</td>
                    <td>${row.lastname}</td>
                    <td>${row.licensePlate}</td>
                    <td>${row.date}</td>
                </tr>
            `;
            });
            tableBody.innerHTML = html;
        }

        // Initialize table with all data on page load
        document.addEventListener('DOMContentLoaded', function() {
            let html = '';
            allData.forEach(row => {
                html += `
                <tr>
                    <td>${row.firstname}</td>
                    <td>${row.lastname}</td>
                    <td>${row.licensePlate}</td>
                    <td>${row.date}</td>
                </tr>
            `;
            });
            document.getElementById('tableBody').innerHTML = html;
        });
    </script>
</body>

</html>