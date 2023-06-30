<?php
  require_once('functions_fibon.php');
  require_once('fibon_header_loggedin.php');
  require_once('fibon_nav_work.php');
  require_once('fibon_login_checks.php');

 if (!isset($_SESSION['user_id'])) {
    echo '<p class="login">Please <a href="fibon_login.php">log in</a> to access this page.</p>';
    exit();
    }
    else {
      $error_msg = "Your profile has been updated, " . $_SESSION['username'] . ".";
  }

      $link = mysqli_connect("localhost", "root", "", "students");

      $user = $_SESSION['user_id'];
      $cur_less_name = $_POST['cur_less_name'];
      $cur_less_id = $_POST['cur_less_loc_id'];
      $cur_less_row_id = $_POST['cur_less_DB_id'];

      $next_toolID = $_POST['next_one_id'];
      $next_toolN = $_POST['next_one_name'];

      $test3 = $cur_less_row_id + 1;
      $true = '1';
      
      $name = $user . $_SESSION['username'] . '_les_order';
      $id = 'u_lesson_id';
      $l_name = 'les_name';
      $l_loc = 'les_loc';
      $l_stat = 'les_stat';
      $l_cur = 'cur_less';

      $name2 = $user . $_SESSION['username'] . '_saved_vid';
      $id2 = 'u_saved_id';
      $sav_id = 'savdvid_name';
      $sav_name  = 'savid_loc';

      $name3 = $user . $_SESSION['username'] . '_tools';
      $id3 = 'u_tools_id';
      $tool_name = 'tool_name';
      $tool_loc  = 'tool_loc';

      $name4 = 'tool central';
      $tc_id = 'tool_id';
      $t_name= 'tool_name';
      $t_loc = 'tool_loc';
 
      
      $query = "INSERT INTO {$name3} ($tool_name, $tool_loc) VALUES ('$next_toolID', ' $next_toolN');";
      $query .= "INSERT INTO {$name2} ($sav_id, $sav_name) VALUES ('$cur_less_name', '$cur_less_id');";
      $query .= "UPDATE student_info_1 SET tool_count = '$test3' WHERE user_id = '$user';";
      $query .= "UPDATE {$name} SET $l_stat= '$true' WHERE $l_name = '$cur_less_name';";
      $query .= "UPDATE {$name} SET $l_cur= '$true' WHERE $id = '$test3'";
      
      
    if (mysqli_multi_query($link, $query)) {
        do {
            if ($result = mysqli_store_result($link)) {
                while ($row = mysqli_fetch_array($result))
                {
                }
            }
        } while (mysqli_next_result($link));
            echo '<p>' . $_SESSION['username'] . ', you can re-watch the lesson you\'ve just completed. Find it <a href="fibon_saved.php">here</a>.</p><br>';
            echo '<p>You have unlocked the \'' . $next_toolN . '\' tool. Find it in your <a href="fibon_concept.php">tools</a>.</p>';
            echo '<p>Your next video-lesson is ready. Find it <a href="fibon_fibon.php">here.</a></p><br>';
            echo '<p>Thank you for updating the database, '.  $_SESSION['username'] . '!</p>'; // Confirm success with the user
    }
    
?>