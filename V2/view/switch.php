
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Switch</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/switch.js"></script>
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
    </nav>
    <div id="side-menu" class="side-nav">
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
        <div  class="A">
          <div id="123" class="B">
            <p class="D">客廳燈</p>
            <p id="lig_status"></p>
          </div>
          <div class="C">
              <div id="livon" class="on" >ON</div>
              <div id="livoff" class="off">OFF</div>
          </div>
        </div>
        <div class="A">
          <div class="B">
            <p >客廳空調</p>
            <p id="air_status"></p>
          </div>
          <div class="C">
              <div id="airon" class="on">ON</div>
              <div id="airoff" class="off">OFF</div>
          </div>
        </div>
      </div>
    </div>
    </body>
  </html>