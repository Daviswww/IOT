<?php
if(empty($_COOKIE['uid'])){
  header("Location: ../index.php?loginXerror");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Talk</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../assets/js/side-bar.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bot.css">
    <script type="text/javascript" src="../assets/js/recall.js"></script>
    <script type="text/javascript" src="../assets/js/bot-recall.js"></script>
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
      <li><div id="sidebar" name="btn"></div></li>
        <li><a href="home.php">sensor </a></li><li>/<li>
        <li><a href="switch.php">switch</a></li><li>/<li>
        <li><a href="chart.php">chart</a></li><li>/<li>
        <li><a href="live.php">live</a></li><li>/<li>
        <li><a href="talk.php">ibot</a></li><li>/<li>
        <li><a href="edit.php">edit</a></li><li>/<li>
        <li><a href="auto.php">auto</a></li><li>/<li>
      </ul>
      <div class="userid">
        <ul >
            <li>USER: <?php echo $_COOKIE['uid'];?></li>
            <li><a name="signout"  href="../control/sign-out.php">sign-out</a></li>
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
    <div class="bot-r">
        <div class="bot-t">
            <div class="bot-p">
                <div id="bot-pc">
                    Alice: 
                </div>
            </div>
            <div class="bot-p">
                <div id="bot-user">
                    User: 
                </div>
            </div>
            <div class="bot-y">
              <div class="bot-u">
                  <botton id="msg-talk"class="msg-btn">語音</botton>
                <div class="bot-i">
                
                </div>
              </div>
            </div>
        </div>
    </div>
</body>
</html>