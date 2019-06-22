<?php
   include '../module/mqttGet.php';
?>

<!DOCTYPE htm>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
        <li><a href="home.php">IOT</a></li>
        <li><a href="publish.php">publish</a></li>
        <li><a href="select.php">select</a></li>
  	  </ul>
    </nav>	
    <div class="inside">
      <div class="ininder">
      <h1>Hello World!</h1>

      <form action = "../control/dbcontrol.php" method="GET">
        	<div>
            <input type="text" name="msg"><br>
        	</div>
        	<button class="button" type="submit" name = "submit" ><span>Insert</span></button>
      </form>
      </div>
    </div>
    </body>
  </html>