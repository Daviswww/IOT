<?php
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
    <!---<script src="../assets/js/main.js"></script>--->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
        <li><a href="home.php">IOT</a></li>
        <li><a href="publish.php">publish</a></li>
        <li><a href="select.php">select</a></li>
        <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout" href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
  	  </ul>
    </nav>	
    <div class="inside">
      <div class="ininder">
      <h1>Hello World!</h1>
          <button class="talk">Talk</button>
          <h3 class="content"></h3>
          <script src="../assets/js/reco.js"></script>
      </div>
    </div>
    </body>
  </html>