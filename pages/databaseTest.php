<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/2ac6e38747.js' crossorigin='anonymous'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
    <title>Test</title>
</head>

<body>
    <?php include_once("../lib/database.php");

    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : "";
    $driverLicenseNumber = isset($_POST['driverLicenseNumber']) ? $_POST['driverLicenseNumber'] : "";
    $exhibitionDate = isset($_POST['exhibitionDate']) ? $_POST['exhibitionDate'] : "";
    $epirationDate = isset($_POST['epirationDate']) ? $_POST['epirationDate'] : "";

        if(isset($_POST['submit'])){
            insertCustomerData($conn, $firstname, $lastname, $birthday, $driverLicenseNumber, $exhibitionDate, $epirationDate);
            echo "<script>alert('Daten erfolgreich gespeichert!');</script>";
        }
    ?>

    <form action="databaseTest.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vorname</label>
            <input name="firstname" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nachname</label>
            <input name="lastname" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Gebursdatum</label>
            <input name="birthday" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Führerscheinnummer</label>
            <input name="driverLicenseNumber" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Austellungsdatum</label>
            <input name="exhibitionDate" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ablaufdatum</label>
            <input name="epirationDate" type="text" class="form-control">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>


</body>

</html>