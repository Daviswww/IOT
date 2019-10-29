<?php
require_once('../assets/vendor/autoload.php');
session_start();
if( time() > $_SESSION['time'] || empty($_COOKIE['uid'])){
  header("Location: ../index.php?login-time-out");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
  </head>
  <body>
    <span>
  	<nav class="nav-main">
  	  <ul>
        <li><a href="home.php">IOT</a></li>
        <li><a href="publish.php">publish</a></li>
        <li><a href="switch.php">switch</a></li>
        <li><a href="select.php">select</a></li>
        <li><a href="creat.php">Edit</a></li>
      <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout"  href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
  	  </ul>
    </nav>	
    <div class="inside">
      <div class="item">
        <h1>
          Hello World2!
        </h1>
        <img style="-webkit-user-select: none;" src="http://140.126.20.183:8080/video.cgi?&user=admin&pwd=123456" width="320" height="240">
        <form action = "../control/pubControl.php" method="POST">
        	MSG:
            <input type="text" name="msg"><br>
        	<button class="button" type="submit" name = "submit" ><span>PUBLISH</span></button>
      </form>
      <h1>Hello World!</h1>
          <button class="talk">Talk</button>
          <h3 class="content"></h3>
          <script src="../assets/js/recall.js"></script>
      </div>
      </div>
    </div>
    </body>
  </html>