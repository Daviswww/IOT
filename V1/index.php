<?php
    include 'includes/dbControl.inc.php';
    include 'includes/dbShow.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="nav-main">
  	  <div class="btn-toggle-nav" onclick="toggleNav()"></div>
  	  <ul>
        <li><a href="index.php">Hearthstone</a></li>
        <li><a href="page/camera.html">camera</a></li>
        <li><a href="page/publish.php">PUBLISH</a></li>
        <li><a href="page/subscribe.php">SUBSCRIBE</a></li>
  	  </ul>
    </nav>	
    <div class="inside">
      <div class="ininder">
        <h1>
          Hello World!
        </h1>
      </div>
    </div>
    </body>
  </html>