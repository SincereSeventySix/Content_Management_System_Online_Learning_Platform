<?php

require_once('fibon_header_loggedin.php');
require_once('fibon_login_checks.php');

$error_msg = "";
$error_msg = $_SESSION['username'] . ', play the games you\'ve earned here!';
echo '<p class="login">' . $error_msg . '</p>';


// If the session vars aren't set, try to set them with a cookie

echo <<<_END
<div id="wrapwork_concept">
      

<div id="inner1_concept">
 <div id="gamesHL" class="cph_outer">
  <div id="gamesHL2" class="concept_button_holder">
_END;

$user = $_SESSION['user_id'];
$name = $user . $_SESSION['username'] . '_games';
$dbc = mysqli_connect("localhost", "root", "", "students");
$query = "SELECT * FROM $name";
$data = mysqli_query($dbc, $query);
$butCount1 = 30;
$butCount2 = 1;

if ($data !== FALSE)
{
  while ($row = mysqli_fetch_array($data)) 
  {
  $toolId = "\"" . $row['game_name']  . "\"";
  $butName = $row['game_loc'];
  echo  '<button title="' . $_SESSION['username'] . '\'s Saved Games" class="game_saved" id=' . $toolId . ' onclick="highLightGame(this.id)">' . $butName .'</button>';
  $butCount1 = $butCount1 - 1;
  $butCount2 = $butCount2 + 1;
 } 
 
 for ($butCount2; $butCount2 < 31; $butCount2++) 
 {
  echo '<button title="' . $_SESSION['username'] . '\'s Future Games" class="game_blank">Game TBA ' . $butCount2 .'</button>';
 }

}
else
{
  for ($butCount2; $butCount2 < 31; $butCount2++) 
 {
  echo '<button title="' . $_SESSION['username'] . '\'s Future Games" class="game_blank">Game TBA ' . $butCount2 .'</button>';
 }
  
}
mysqli_close($dbc);
  echo <<<_END
  
  
</div> 
</div>
</div>

<div id="inner2_concept">
<img class="contain" src="userImages/plato.png" alt="profile picture">
  <div id="inner3_concept"></div>
</div> 
</div>
</body>

<script src="scripts/utils.js"></script>
<script src="scripts/games.js"></script>
</html>
_END;

?>