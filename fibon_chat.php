<?php


require_once('fibon_header_loggedin.php');
require_once('fibon_nav_work.php');
require_once('fibon_login_checks.php');




// If the session vars aren't set, try to set them with a cookie
if (!isset($_SESSION['user_id'])) {
  if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['username'] = $_COOKIE['username'];    
  }
}










echo <<<_END
<div id="TBA"></div>



  </body>
  <script src="fibon.js"></script>
</html>

_END;

?>