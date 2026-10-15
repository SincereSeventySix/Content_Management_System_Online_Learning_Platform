<?php
  require_once('functions_fibon.php');
  require_once('fibon_header_loggedin.php');
  require_once('fibon_login_checks.php');

  $error_msg = "";
  $error_msg = 'Welcome back, ' . $_SESSION['username'] . '. You are logged into Otutor.';
  echo '<p class="login">' . $error_msg . '</p>';
   
  $testVal = 'test';
  $session_user = $_SESSION['username'];
  $dbc = mysqli_connect("localhost", "root", "", "students");
  $query = "SELECT $testVal FROM student_info_1 WHERE user_id = '" . $_SESSION['user_id'] . "'";
  $data = mysqli_query($dbc, $query);
  $row = mysqli_fetch_array($data);
  $teval = $row['test'];

    if ($teval == 0) {
      echo '<p id="errorTest">Test not Taken</p>'; 
      require_once('fibon_video.php');  
    } 
    elseif ($teval == 1) {
      echo '<p id="errorTest">Test Taken</p>';
      require_once('fibon_video.php');      
      }    
  
?>


