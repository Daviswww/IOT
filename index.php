<?php
    include 'includes/dbControl.inc.php';
    include 'includes/dbShow.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show u">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Home</title>
  
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/backgroundstyle.css">
  </head>
  <body>
  	<nav class="nav-main">
  	  <div class="btn-toggle-nav" onclick="toggleNav()"></div>
  	  <ul>
        <li><a href="index.php">Hearthstone</a></li>
  	  </ul>
    </nav>	
    <div class="inside">
      <aside class="nav-sidebar">
      <ul>
          <li><span>MENU</span></li>
          <li><a href="page/about.html">ABOUT</a></li>
          <li><a href="page/delete.php">DELETE</a></li>
          <li><a href="page/update.php">UPDATE</a></li>
          <li><a href="page/insert.php">INSERT</a></li>
          <li><a href="page/select.php">SELECT</a></li>
          <li><a href="page/publish.php">PUBLISH</a></li>
      </ul>
      </aside>
      <div class="ininder">
        <div class="login">
          <form class="form-signin" action="includes/login.inc.php" method="POST"> 
              <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> 
              <h1 class="h3 mb-3 font-weight-normal">Sign up</h1> 
              <label for="inputEmail" class="sr-only">Email address</label>             
              <input type="text" name="uid" id="inputUid" class="form-control" placeholder="User ID" required autofocus> 
              <label for="inputPassword" class="sr-only">Password&nbsp;&nbsp;</label>             
              <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required> 
              <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">submit</button>
              <p class="mt-5 mb-3 text-muted">&copy;ヽ( ﾟ ∀ 。)ノ</p> 
          </form>  
        </div>
      </div>
    </div>
    </body>
  </html>