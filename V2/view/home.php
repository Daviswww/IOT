<?php

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
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../assets/js/Linechart.js"></script>
    <script src="../assets/js/main.js"></script>
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
      <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout"  href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
    </nav>
    <div class="inside">
    <div class="container">
        <div class="item1">
          <div id="chart">
          </div>
        </div>
        <div class="item2">
          <h1 id="air_humidity">
          </h1>
        </div>
        <div class="item3">
          <h1 id="soil_humidity">
            
          </h1>
        </div>
        <div class="item4">
          <h1 id="temperature">
            
          </h1>
        </div>
        <div class="item5">
          <h1 id="rainfall">
          </h1>
        </div>
        <div class="item6">
          <h1 id="illumination">
            
          </h1>
        </div>
      </div>
    </div>
    </body>
  </html>