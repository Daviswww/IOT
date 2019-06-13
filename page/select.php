<?php
    session_start();
    include '../includes/dbControl.inc.php';
    include '../includes/dbShow.inc.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show u">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>SELECT</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
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
      <h1>SELECT</h1><br>
      <form action = "../script/sel.php" method="GET">
          <label for="bookdate">日期：</label>
          <input name="date" type="date" ><br>
        	<button class="button" type="submit" name = "submit" ><span>Select</span></button>
      </form>
      <?php
        $show = new Show();
        echo "<h1>YOUR SELECT</h1><br>";
        if(isset($_SESSION["check"]))
        {
          echo "Select: ".$_SESSION["date"]."<br>";
          $show->showSELdata($_SESSION["date"]);
        }
        echo "<br><h1>LIST</h1><br>";
        $show->showALLdata();
      ?>
      </div>
    </div>
  </body>
</html>