<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Custom CSS (Optional, for further customization) -->
  <!--<link rel="stylesheet" href="custom.css">-->
</head>

<body>
  <?php
    include_once("../lib/database.php");
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $pasword = isset($_POST['password']) ? hash("sha256", $_POST['password']) : "";
    
    if (!empty($username) && !empty($pasword)) {
      $user = getLoginData($db, $_POST['username']);

      if (!empty($user)) {
        if ($user['password'] == $pasword) {
          $_SESSION['active'] = true;
        }
      } else {
        $_SESSION['error'] = true;
      }
    }

    if (!isset($_SESSION['active'])) {
      session_destroy();
    }

    if (isset($_SESSION['active'])) {
      header("Location: loggedIn.php");
      exit();
    }
  ?>

  <div class="container-fluid bg-light p-5">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-10 bg-white rounded shadow p-4">
        <h2 class="text-center mb-4">Login</h2>
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="username" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Custom JavaScript (Optional, for interactive elements) -->
  <!--<script src="custom.js"></script>-->
</body>

</html>