<?php
require_once('../assets/vendor/autoload.php');
session_start();
if( time() > $_SESSION['time'] || empty($_COOKIE['uid'])){
  header("Location: ../index.php?login-time-out");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <!--<link rel="stylesheet" href="resetstyle.css">-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/side-bar.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/live.js"></script>
    <link rel="stylesheet" href="../assets/css/livestyle.css">
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
      <li><div id="sidebar" name="btn"></div></li>
        <li><a href="home.php">sensor </a></li><li>/<li>
        <li><a href="switch.php">switch</a></li><li>/<li>
        <li><a href="chart.php">chart</a></li><li>/<li>
        <li><a href="live.php">live</a></li><li>/<li>
        <li><a href="talk.php">qsbot</a></li><li>/<li>
        <li><a href="edit.php">edit</a></li><li>/<li>
      </ul>
      <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout"  href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
    </nav>
    <div id="side-menu"class="side-nav">
      <ul id="lst-menu">
      <span>MENU</span>
        <li><a href="home.php">sensor </a></li>
        <li><a href="switch.php">switch</a></li>
        <li><a href="chart.php">chart</a></li>
        <li><a href="live.php">live</a></li>
        <li><a href="talk.php">ibot</a></li>
        <li><a href="edit.php">edit</a></li>
      </ul>
    </div>
    <div class="inside">
        <div id="container" class="container">

        </div>
  </div>
    </div>
    </body>
  </html>