<?php
if(empty($_COOKIE['uid'])){
    header("Location: ../index.php?loginXerror");
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/drop-down-list.js"></script>
        <script type="text/javascript" src="../assets/js/side-bar.js"></script>
        <script type="text/javascript" src="../assets/js/creat.js"></script>
        <script type="text/javascript" src="../assets/js/jserver.js"></script>
        <link rel="stylesheet" href="../assets/css/formbox.css">
        <link rel="stylesheet" href="../assets/css/drop-down-list.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
    <nav class="nav-main">
  	  <ul>
        <li><div id="sidebar" name="btn"></div>
        <li><a href="home.php">sensor</a></li><li>/<li>
        <li><a href="switch.php">switch</a></li><li>/<li>
        <li><a href="chart.php">live</a></li><li>/<li>
        <li><a href="chart.php">chart</a></li><li>/<li>
        <li><a href="talk.php">ibot</a></li><li>/<li>
        <li><a href="edit.php">edit</a></li><li>/<li>
        <li><a href="auto.php">auto</a></li><li>/<li>
      </ul>
        <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout" href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
  	  
    </nav>	
    <div id="side-menu" class="side-nav">
      <ul id="lst-menu">
        <span>MENU</span>
        <li><a href="home.php">sensor </a></li>
        <li><a href="switch.php">switch</a></li>
        <li><a href="chart.php">chart</a></li>
        <li><a href="live.php">live</a></li>
        <li><a href="talk.php">ibot</a></li>
        <li><a href="edit.php">edit</a></li>
        <li><a href="auto.php">auto</a></li>
      </ul>
    </div>
    <div class="creat_box">
      <div class="form">
        <div class="creat_bb">
          <div id="SelectType" class="type">
            <input type="radio" value="sensor" name="type" checked><label for="sen" >感應器</label>
            <input type="radio" value="switch" name="type"><label for="swi">開關裝置</label>
            <input type="radio" value="camera" name="type"><label for="cam">攝影機</label>
            <input type="radio" value="auto" name="type"><label for="aut">自動裝置</label>
          </div>
          <div id="drop"class="wrapper-dropdown">
              <p id="ls-tag">Select</p>
                <ul id="dropdown"class="dropdown">
                    <div id="sensor-list" class="sensor-list">
                    </div>
                    <div id="switch-list" class="switch-list">
                    </div>
                    <div id="auto-list" class="auto-list">
                    </div>
                    <div id="camera-list" class="camera-list">
                      </div>
                </ul>
           </div>
          <div id="sensor-form" class="sensor-form">
            感應器編號:<input id="sensor-id-Number" tpye="text" placeholder="ID Number" value=""><br>
            感應器序號:<input id="sensor-order" tpye="text" placeholder="Order" value=""><br>
            感應器型態:<input id="sensor-type-Name" tpye="text" placeholder="Type Name" value=""><br>
            感應器名字:<input id="sensor-Name" tpye="text" placeholder="Sensor Name" value=""><br>
            感應器單位:<input id="sensor-unit" tpye="text" placeholder="Unit" value=""><br>
          </div>
          <div id="camera-form" class="camera-form">
              攝影機編號:<input id="camera-id-Number" tpye="text" placeholder="ID Number" value="">
              攝影機順序:<input id="camera-order" tpye="text" placeholder="Order" value=""><br>
              攝影機說明:<input id="camera-description" tpye="text" placeholder="Camera name" value=""><br>
              攝影機帳號:<input id="camera-user" tpye="text" placeholder="Username" value="">
              攝影機密碼:<input id="camera-pwd" tpye="text" placeholder="Password" value=""><br>
              攝影機地址:<input id="camera-ip" tpye="text" placeholder="IP" value="">
              攝影機阜號:<input id="camera-port" tpye="text" placeholder="Port" value=""><br>
              攝影機型態:<input id="camera-type" tpye="text" placeholder="Ex:video.mjpg, video.cgi" value=""><br>
          </div>
          <div id="switch-form" class="switch-form">
              開關編號:<input id="switch-id-Number" tpye="text" placeholder="ID Number" value=""><br>
              開關序號:<input id="switch-order" tpye="text" placeholder="Order" value=""><br>
              開關型態:<input id="switch-type-Name" tpye="text" placeholder="Type Name" value=""><br>
              開關名字:<input id="switch-Name" tpye="text" placeholder="Sensor Name" value=""><br>
            </div>
          <div id="auto-form" class="auto-form">
            自動控制編號:<input id="auto-id-Number" tpye="text" placeholder="ID Number" value=""><br>
            自動控制序號:<input id="auto-order" tpye="text" placeholder="Order" value=""><br>
            自動控制說明:<input id="auto-des" tpye="text" placeholder="Description" value=""><br>
            自動控制開關名稱:
            <select id="auto-switch-order">
                <option value="" disabled selected hidden>開關裝置</option>
              </select><br>
            開啟設定:
            <select id="auto-on-Order">
              <option  value="" disabled selected hidden>感應器</option>
            </select>
            <select id="auto-on-Symbol">
                <option value="" disabled selected hidden>比較運算子</option>
                <option value=">">大於 (>)</option>
                <option value="<">小於 (<)</option>
                <option value="=">等於 (==)</option>
            </select>
            <input id="auto-on-Norm" tpye="text" placeholder="Norm" value=""><br>
            關閉設定:
            <select id="auto-off-Order">
              <option value="" disabled selected hidden>感應器</option>
            </select>
            <select id="auto-off-Symbol">
                <option value="" disabled selected hidden>比較運算子</option>
                <option value=">">大於 (>)</option>
                <option value="<">小於 (<)</option>
                <option value="=">等於 (==)</option>
            </select>
            <input id="auto-off-Norm" tpye="text" placeholder="Norm" value=""><br>
          </div>
          <div id="errmsg" class="errmsg"></div>
          <div class="bt-box">
              <button id="modify" class="botton modify">modify</button>
              <button id="insert" class="botton insert">insert</button>
              <button id="delete" class="botton delete">delete</button>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>