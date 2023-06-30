<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php
     if (!isset($_SESSION['username'])) {
       echo '<title>Otutor</title>';
     } else {
      echo '<title>' . $_SESSION['username'] . '\'s Otutor</title>';
     }
     ?>
    <link rel="stylesheet" href="style/fibonlanding.css">
    <title>Classname Home</title>
  </head>
  <body>
    <div id="header">
    <div id="socialMediaBar">
    <a href="https://www.youtube.com/channel/UCAaEYeSaEVU06xJptAJVBCg?view_as=subscriber"><div id="socialTY" class="social"></div></a>
    <a href="https://www.instagram.com/otutoronline/?hl=en"><div id="socialIN" class="social"></div></a>
    <a href="https://twitter.com/Otutor3"><div id="socialTW" class="social"></div></a>
    <a href="https://www.facebook.com/Otutor-100554684989050/?modal=admin_todo_tour"><div id="socialFB" class="social"></div></a>
  </div>
      <div id="logo"> <img id="innerlogo" src="images/logo.jpg" alt="the logo"></div>
      
        <?php
        $error_msg = "";
        if (!isset($_SESSION['user_id'])) {
         echo '<p class="login3"><a href="fibon_login.php">Log In</a><a href="fibon_form.php">Sign Up</a></p>';
         } else {
         echo '<p class="login">' . $error_msg . '</p>';
         }
        ?> 
    </div>


    
