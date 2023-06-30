<?php

require_once('fibon_header_loggedin.php');
require_once('fibon_login_checks.php');

$error_msg = "";
$error_msg = $_SESSION['username'] . ', re-watch your completed lessons here!';
echo '<p class="login">' . $error_msg . '</p>';


// If the session vars aren't set, try to set them with a cookie
echo <<<_END

<div id="wrapwork_saved">


  <div id="vid_player">
    
  </div>

      

<div id="inner1_saved">
 <div id="buttonHL" class="cph_outer">
  <div id="buttonHL2" class="concept_button_holder">
_END;

$user = $_SESSION['user_id'];
$name = $user . $_SESSION['username'] . '_saved_vid';
$dbc = mysqli_connect("localhost", "root", "", "students");
$query = "SELECT * FROM $name";
$data = mysqli_query($dbc, $query);
$butCount1 = 30;
$butCount2 = 1;

if ($data !== FALSE)
{
  while ($row = mysqli_fetch_array($data)) 
  {
  $toolId = "\"" . $row['savid_loc']  . "\"";
  $butName = $row['savdvid_name'];
  echo  '<button title="' . $_SESSION['username'] . '\'s Saved Video-Lessons" class="video_saved" id=' . $toolId . ' onclick="showVid(this.id); highLightButton(this.id)">' . $butName .'</button>';
  $butCount1 = $butCount1 - 1;
  $butCount2 = $butCount2 + 1;
 } 
 
 for ($butCount2; $butCount2 < 31; $butCount2++) 
 {
  echo '<button title="' . $_SESSION['username'] . '\'s Future Video-Lessons" class="video_blank">Video To be announced ' . $butCount2 .'</button>';
 }

}
else
{
  for ($butCount2; $butCount2 < 31; $butCount2++) 
 {
  echo '<button title="' . $_SESSION['username'] . '\'s Future Video-Lessons" class="video_blank">Video TBA ' . $butCount2 .'</button>';
 }
  
}
mysqli_close($dbc);
  echo <<<_END
  
  
</div> 
</div>
</div>

<div id="inner2_saved">
<img class="contain" src="userImages/plato.png" alt="profile picture">
  <div id="inner3_saved"></div>
</div> 
</div>
</body>

<script src="scripts/utils.js"></script>
<script src="scripts/savd_vids.js"></script>
</html>
_END;

?>