<?php
require_once('fibon_header_loggedin.php');
require_once('fibon_login_checks.php');

$error_msg = "";
$error_msg =$_SESSION['username'] . ', use the points you\'ve earned to choose games here!';
echo '<p class="login">' . $error_msg . '</p>';

echo <<<_END
<div id="wrapwork_concept">
    <div id="inner1_concept">
        <div class="cph_outer">
            <div class="concept_button_holder"></div> 
        </div>
    </div>
  
    <div id="inner2_concept">
    <img class="contain" src="userImages/plato.png" alt="profile picture">
          <div id="inner3_concept"></div>
    </div> 
</div>
</body>
<script src="scripts/utils.js"></script>
<script src="scripts/fibon.js"></script>
</html>
_END;
?>