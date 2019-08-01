<?php
if(empty($_COOKIE['uid'])){
    header("Location: ../index.php?loginXerror");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chart</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <!---<script src="../assets/js/main.js"></script>--->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="../assets/js/columnchart.js"></script>
    <script type="text/javascript" src="../assets/js/gaugechart.js"></script>
    <script type="text/javascript" src="../assets/js/linecharts.js"></script>
    <script type="text/javascript" src="../assets/js/side-bar.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
        <li><div id="sidebar" name="btn"></div>
        <li><a href="home.php">IOT</a></li>
        <li><a href="switch.php">switch</a></li>
        <li><a href="chart.php">Chart</a></li>
        <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout" href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
  	  </ul>
    </nav>	
    <div id="side-menu" class="side-nav">
      <ul>
          <span>LIST</span>
          <li><a href="#">Community</a></li>
          <li><a href="#">Community</a></li>
          <li><a href="#">Add</a></li>
      </ul>
    </div>
    <div class="inside">
      <div class="container"> 
        <div class="bk">
          <div id="chart_div" class="box">
          </div>
        </div>
        <div class="bk">
          <div id="clum"class="box">

          </div>
        </div>
        <div class="bk">
          <div id="gauge"class="box">

          </div>
        </div>
      </div>
    </div>
    </body>
  </html>