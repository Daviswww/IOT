<?php
  if(!empty($_COOKIE['uid'])){
    header("Location: view/home.php?GG");
  }
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="sty  lesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <!--sign-IN-->
        <div id="login">   
          <h1>Welcome Back!</h1>
          <form action="control/regControl.php" method="post">
            <div class="field-wrap">
            <label>
              Username or Email Address<span class="req">*</span>
            </label>
            <input name="user_uid" type="text" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="user_password" type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button name="signin" class="button button-block">SIGN-IN</button>
          
          </form>
        </div>
        <!--sign-UP-->
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="control/regControl.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input name="user_FirstName" type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input name="user_LastName" type="text"required autocomplete="off"/>
            </div>
          </div>
          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input name="user_uid" type="text"required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="user_email"type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input name="user_password" type="password"required autocomplete="off"/>
          </div>
          
          <button name="signup" type="submit" class="button button-block">SIGN-UP</button>
          
          </form>

        </div>

        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="assets/js/login.js"></script>




</body>

</html>
