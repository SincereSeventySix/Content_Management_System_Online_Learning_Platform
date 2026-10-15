<?php

require_once('functions_fibon.php');

       
if (!isset($_SESSION['user_id'])) {
  echo '<p class="error">Please <a href="fibon_login.php">log in</a> or <a href="fibon_form.php">sign up</a> to continue.</p>';
  exit();
}
else 
{
  
  $rows = otutorRows("SELECT profile FROM student_info_1 WHERE user_id = ?", "i", array((int) $_SESSION['user_id']));
  $row = isset($rows[0]) ? $rows[0] : null;

  if ($row) {
      if (!empty($row['profile'])) 
        {
        require_once('fibon_nav_work.php');
        echo '<a title="' . $_SESSION['username'] . '\'s Profile Picture" href="fibon_editpro.php"><img class="contain1" src="' . GW_UPLOADPATH . $row['profile'] . '" alt="Profile Picture" /></a>';  
        }
        if (empty($row['profile'])) 
        {
        require_once('fibon_nav_work.php');
        echo '<a title="' . $_SESSION['username'] . ', Change Your Profile Picture" href="fibon_editpro.php"><img class="contain1" src="userImages/original.jpg" alt="profile picture"></a>';
        }       
  }          
  else
  {
  echo '<p class="login">There was a problem accessing your profile.</p>';
  }
  }
?>




