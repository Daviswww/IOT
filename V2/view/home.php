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
    <script src="../assets/js/main.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
        <li><a href="home.php">IOT</a></li>
        <li><a href="publish.php">publish</a></li>
        <li><a href="select.php">select</a></li>
      </ul>
      <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout"  href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
    </nav>
    <div class="inside">
      <div class="item1">
        <h1>
          Hello World1!
        </h1>
      </div>
      <div class="container">
        <div class="item2">
          <h1>
            Hello World2!
          </h1>
        </div>
        <div class="item3">
          <h1>
            Hello World3!
          </h1>
        </div>
        <div class="item4">
          <h1>
            Hello World4!
          </h1>
        </div>
        <div class="item5">
          <h1>
            Hello World5!
          </h1>
        </div>
        <div class="item6">
          <h1>
            Hello World6!
          </h1>
        </div>
      </div>
    </div>
    </body>
  </html>