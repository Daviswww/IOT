<?php
    session_start();
    $_SESSION["msg"] .= '';
    $_SESSION["sub"] = '';
    $_SESSION["count"] = 0; 
    include '../includes/dbControl.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show u">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>PUBLISH</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/jq.js">
    
    </script>
  </head>
  <body>
  	<nav class="nav-main">
  	  <div class="btn-toggle-nav" onclick="toggleNav()"></div>
  	  <ul>
  	  	<li><a href="../index.php">Hearthstone</a></li>
  	  </ul>
    </nav>	
    <div class="inside">
    <aside class="nav-sidebar">
      <ul>
        <li><span>MENU</span></li>
        <li><a href="about.html">ABOUT</a></li>
        <li><a href="delete.php">DELETE</a></li>
        <li><a href="update.php">UPDATE</a></li>
        <li><a href="insert.php">INSERT</a></li>
        <li><a href="select.php">SELECT</a></li>
        <li><a href="publish.php">PUBLISH</a></li>
        <li><a href="subscribe.php">SUBSCRIBE</a></li>
      </ul>
    </aside>
    <div class="ininder">
      <h1>SUBSCRIBE</h1><br>
      <form action = "subscribe.php" method="GET">
        	MSG:
            <input type="text" name="getmsg" value="123"><br>
        	<button class="button" type="submit" name = "submit" ><span>PUBLISH</span></button>
      </form>
      <h1>MSG</h1><br>
      <div id = "qwe123">
      <div>
    </div>
  </div>
    </body>
  </html>