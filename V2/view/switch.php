<?php
if(empty($_COOKIE['uid'])){
  header("Location: ../index.php?loginXerror");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Switch</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/switchh.js"></script>
    <!--<script src="../assets/js/reco.js"></script>-->
    <script src="../assets/js/side-bar.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/switchstyle.css">
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
      <li><div id="sidebar" name="btn"></div></li>
        <li><a href="home.php">IOT</a></li>
        <li><a href="switch.php">switch</a></li>
        <li><a href="chart.php">chart</a></li>
      </ul>
      <div class="userid">
            <ul >
              <li>USER: <?php echo $_COOKIE['uid'];?></li>
              <li><a name="signout"  href="../control/sign-out.php">sign-out</a></li>
            </ul>
          </div>
    </nav>
    <div id="side-menu" class="side-nav">
      <ul>
          <span>LIST</span>
          <li><a href="#">一樓</a></li>
          <li><a href="#">二樓</a></li>
          <li><a href="#">三樓</a></li>
      </ul>

    </div>
    <div class="inside">
      <div id="container" class="container">
      <div class="A">
        <img style="-webkit-user-select: none;" src="http://140.126.20.95/video.cgi?&user=admin&pwd=123456" width="100%" height="100%">
      </div>
      <div class="A">
        <div class="B">
          <p class="D">語音辨識</p>
          <p class="content"></p>
        </div>
        <div class="C">
        <button class="talk">Talk</button>
      </div>

      </div>
    </div>
    </body>
  </html>