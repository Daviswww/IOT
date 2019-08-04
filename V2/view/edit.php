<?php
if(empty($_COOKIE['uid'])){
    header("Location: ../index.php?loginXerror");
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
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
        <li><a href="chart.php">chart</a></li><li>/<li>
        <li><a href="edit.php">edit</a></li><li>/<li>

        <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
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
        <li><a href="chart.php">chart</a></li>
        <li><a href="edit.php">edit</a></li>
      </ul>
    </div>
    <div class="creat_box">
      <div class="form">
        <div class="creat_bb">
          <div id="SelectType" class="type">
            <input type="radio" value="sensor" name="type" checked><label for="sen" >感應器</label>
            <input type="radio" value="switch" name="type"><label for="swi">開關裝置</label>
          </div>
          <div id="drop"class="wrapper-dropdown">
              <p id="ls-tag">Select</p>
                <ul id="dropdown"class="dropdown">
                    <div id="sensor-list" class="sensor-list">
                    </div>
                    <div id="switch-list" class="switch-list">
                    </div>
                </ul>
           </div>
          <div id="sensor-form" class="sensor-form">
            感應器編號:<input id="sensor-id-Number" tpye="text" placeholder="ID Number" value=""><br>
            感應器型態:<input id="sensor-type-Name" tpye="text" placeholder="Type Name" value=""><br>
            感應器名字:<input id="sensor-Name" tpye="text" placeholder="Sensor Name" value=""><br>
            感應器單位:<input id="sensor-unit" tpye="text" placeholder="Unit" value=""><br>
          </div>
          <div id="switch-form" class="switch-form">
              開關編號:<input id="switch-id-Number" tpye="text" placeholder="ID Number" value=""><br>
              開關型態:<input id="switch-type-Name" tpye="text" placeholder="Type Name" value=""><br>
              開關名字:<input id="switch-Name" tpye="text" placeholder="Sensor Name" value=""><br>
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