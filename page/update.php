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
    <title>UPDATE</title>
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
      <h1>UPDATE</h1><br>
      <form action = "../script/upd.php" method="GET">
        	<div>
        		A:
            <input type="text" name="a"><br>
            B:
				    <input type="text" name="b"><br>
        		C:
        		<input type="text" name="c"><br>
            D:
            <input type="text" name="d"><br>
        	</div>
        	<button class="button" type="submit" name = "submit" ><span>Update</span></button>
      </form>	
      
      <?php
        $show = new Show();
        echo "<h1>IS UPDATE</h1><br>";
        if(isset($_SESSION["name"])){
          $show->showUPDdata($_SESSION["name"]);
        }
        echo "<br><h1>LIST</h1><br>";
        $show->showALLdata();
      ?>
      </div>
    </div>
  </body>
</html>