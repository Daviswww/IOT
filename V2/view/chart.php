<!--
<?php
if(empty($_COOKIE['uid'])){
    header("Location: ../index.php?loginXerror");
}
?>
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chart</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="../assets/js/drop-down-list.js"></script>
    <script type="text/javascript" src="../assets/js/side-bar.js"></script>
    <script type="text/javascript" src="../assets/js/list-sensor.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formbox.css">
    <link rel="stylesheet" href="../assets/css/drop-down-list.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
    <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
    <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
    <script type="text/javascript" src="../assets/js/highcharts.js"></script>
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
        <li><div id="sidebar" name="btn"></div>
        <li><a href="home.php">sensor </a></li><li>/<li>
        <li><a href="switch.php">switch</a></li><li>/<li>
        <li><a href="chart.php">live chart</a></li><li>/<li>
        <li><a href="edit.php">edit</a></li><li>/<li>
        <li><a href="talk.php">talk</a></li><li>/<li>
        <div class="userid">
        <ul >
          <!--<li>USER: <?php echo $_COOKIE['uid'];?></li>-->
          <li><a name="signout" href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
  	  </ul>
    </nav>	
    <div id="side-menu" class="side-nav">
      <ul id="lst-menu">
        <span>MENU</span>
        <li><a href="home.php">sensor</a></li>
        <li><a href="switch.php">switch</a></li>
        <li><a href="chart.php">live chart</a></li>
        <li><a href="edit.php">edit</a></li>
      </ul>
    </div>
    <div class="creat_box">
      <div class="form">
        <div class="creat_bb">
          <h1>LIVE CHART</h1>
          <div id="drop"class="wrapper-dropdown">
              <p id="ls-tag"></p>
                <ul id="dropdown"class="dropdown">
                    <div id="sensor-list" class="sensor-list">
                    </div>
                </ul>
           </div>  
           <div class="chart-box">
             <div id="container" style="min-width:400px;height:400px"></div>
           </div>
        </div>
      </div>  
    </div>
    </body>
  </html>