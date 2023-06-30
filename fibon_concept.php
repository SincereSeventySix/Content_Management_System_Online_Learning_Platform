<?php
require_once('fibon_header_loggedin.php');
require_once('fibon_login_checks.php');

$error_msg = "";
$error_msg =  $_SESSION['username'] . ', find your English Learning Tools here!';
echo '<p class="login">' . $error_msg . '</p>';

echo <<<_END
<div id="wrapwork_concept">

<div id="inner_tool">


</div>

    
     
  <div id="inner1_concept">
  
    <div id="toolHL" class="cph_outer">
      <div id="toolHL2" class="concept_button_holder">
_END;
$user = $_SESSION['user_id'];
$name = $user . $_SESSION['username'] . '_tools';
$dbc = mysqli_connect("localhost", "root", "", "students");
$query = "SELECT * FROM $name";
$data = mysqli_query($dbc, $query);
$butCount1 = 30;
$butCount2 = 1;

if ($data !== FALSE)
{
  while ($row = mysqli_fetch_array($data)) 
  {
  $toolId = "\"" . $row['tool_name']  . "\"";
  $butName = $row['tool_loc'];
  echo  '<button title="' . $_SESSION['username'] . '\'s Unlocked Tool" class="tool_active" id=' . $toolId . ' onclick="showTool(this.id); highLightTool(this.id)">' . $butName .'</button>';
  $butCount1 = $butCount1 - 1;
  $butCount2 = $butCount2 + 1;
 } 
 
 for ($butCount2; $butCount2 < 31; $butCount2++) 
 {
  echo '<button title="' . $_SESSION['username'] . '\'s Locked Tool" class="tool_blank">Tool TBA ' . $butCount2 .'</button>';
 }

}
else
{
  for ($butCount2; $butCount2 < 31; $butCount2++) 
 {
  echo '<button title="' . $_SESSION['username'] . '\'s Future Tool" class="tool_blank">Tool TBA ' . $butCount2 .'</button>';
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
<script src="scripts/toolget.js"></script>
<script src="scripts/verb_tool.js"></script>
</html>
_END;

?>