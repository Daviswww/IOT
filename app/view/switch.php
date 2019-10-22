<?php
if($_COOKIE[$_COOKIE['pv']]!=$_COOKIE[$_COOKIE['pu']]){
  header("Location: ../index.php?login-error");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--javascript js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/create-sh.js"></script>
    <script src="../assets/js/switch-ps.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/btn.css">
    <title>APP</title>
  </head>
  <body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="sensor.php">IOT</a>
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarsExample01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="switch.php">SWITCH <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sensor.php">SENSOR <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">SIGN-OUT <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
    <div id="switch" class="main">
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>