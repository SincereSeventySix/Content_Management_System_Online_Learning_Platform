<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="refresh" charset="utf-8" content="900;url=fibon_logout.php">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php  
      require_once('startsession.php');
      
     if (isset($_SESSION['username'])) {
        echo '<title>' . $_SESSION['username'] . '\'s Otutor</title>';
        echo '<link rel="stylesheet" href="style/fibonlanding.css">';
        echo '<link rel="stylesheet" href="style/otutor-mobile.css">';
        echo '<link rel="stylesheet" href="style/video_lesson_page.css">';
        echo '<link rel="stylesheet" href="style/concept_tools.css">';
        echo '<link rel="stylesheet" href="style/saved_lessonVid_page.css">';
        echo '<link rel="stylesheet" href="style/saved_game_page.css">';
        echo '<head>';
        echo '<body>';
        echo '<div id="header">';
        echo '<button type="button" class="nav-toggle" aria-expanded="false">Menu</button>';
        echo '<div id="logo"> <img id="innerlogo" src="images/logo.jpg" alt="the logo"></div>';
        echo '</div>';       
     } else {
        echo '<title>Otutor</title>';
        echo '<link rel="stylesheet" href="style/fibonlanding.css">';
        echo '<link rel="stylesheet" href="style/otutor-mobile.css">';
        echo '<p class="error">You must to <a href="fibon_login.php">log in</a> to access this section of Otutor.<p>';
     }
   ?>
    <script>
      document.addEventListener("click", function (event) {
        var button = event.target.closest(".nav-toggle");
        if (!button) return;
        var open = document.body.classList.toggle("nav-open");
        button.setAttribute("aria-expanded", open ? "true" : "false");
      });
    </script>
    

    