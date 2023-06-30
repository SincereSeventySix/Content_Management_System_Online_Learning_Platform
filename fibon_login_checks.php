<?php

require_once('functions_fibon.php');

       
if (!isset($_SESSION['user_id'])) {
  echo '<p class="error">Please <a href="fibon_login.php">log in</a> or <a href="fibon_form.php">sign up</a> to continue.</p>';
  exit();
}
else 
{
  
  $dbc = $connection;
  // Grab the profile data from the database
  if (!isset($_GET['user_id'])) 
  {
  $query = "SELECT profile FROM student_info_1 WHERE user_id = '" . $_SESSION['user_id'] . "'";
  }
  else {
  $query = "SELECT profile FROM student_info_1 WHERE user_id = '" . $_GET['user_id'] . "'";
              }
  $data = queryMysql($query);

  if (mysqli_num_rows($data) == 1) {
    $row = mysqli_fetch_array($data);    
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
  mysqli_close($dbc);
  }
?>




