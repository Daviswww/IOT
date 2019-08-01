<?php
include '../module/dbGet.php';
$get = new Dbget();
if(empty($_COOKIE['uid'])){
  header("Location: ../index.php?loginXerror");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/side-bar.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
    <script src="../assets/js/sensor.js"></script>
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
      <li><div id="sidebar" name="btn"></div></li>
        <li><a href="home.php">IOT</a></li>
        <li><a href="switch.php">switch</a></li>
        <li><a href="chart.php">Chart</a></li>
      </ul>
      <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout"  href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
    </nav>
    <div id="side-menu"class="side-nav">
      <ul>
          <span>LIST</span>
          <li><a href="home.php">室內</a></li>
          <li><a href="#">室外</a></li>
          <li><a href="#">花園</a></li>
      </ul>
    </div>
    <div class="inside">
      <div id="container" class="container">

      </div>
    </div>
    </body>
  </html>