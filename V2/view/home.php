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
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/side-bar.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
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
          <li><a href="#">Community</a></li>
          <li><a href="#">Community</a></li>
          <li><a href="#">Community</a></li>
      </ul>
    </div>
    <div class="inside">
      <div class="container">
        <div class="A">
          <div class="B">
            <p id="temperature">0℃</p>
            <p>室外溫度</p>
          </div>
          <div class="C">
              info
          </div>
        </div>
        <div class="A">
          <div class="B">
            <p id="temperature">0℃</p>
            <p>室內溫度</p>
          </div>
          <div class="C">
              info
          </div>
        </div>
        <div class="A">
          <div class="B">
            <p id="soil_humidity">0</p>
            <p>土壤濕度</p>
          </div>
          <div class="C">
              info
          </div>
        </div>
        <div class="A">
          <div class="B">
            <p id="air_humidity">0</p>
            <p>空氣濕度</p>
          </div>
          <div class="C">
              info
          </div>
        </div>
        <div class="A">
          <div class="B">
            <p id="illumination">0</p>
            <p>光照</p>
          </div>
          <div class="C">
              info
          </div>
        </div>
        <div class="A">
          <div class="B">
            <p id="rainfall">0</p>
            <p>雨量</p>
          </div>
          <div class="C">
              info
          </div>
        </div>
      </div>
    </div>
    </body>
  </html>