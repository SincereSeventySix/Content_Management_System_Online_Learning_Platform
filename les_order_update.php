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

      $user = (int) $_SESSION['user_id'];
      $cur_less_name = isset($_POST['cur_less_name']) ? $_POST['cur_less_name'] : '';
      $cur_less_id = isset($_POST['cur_less_loc_id']) ? $_POST['cur_less_loc_id'] : '';
      $cur_less_row_id = isset($_POST['cur_less_DB_id']) ? (int) $_POST['cur_less_DB_id'] : 0;

      $next_toolID = isset($_POST['next_one_id']) ? $_POST['next_one_id'] : '';
      $next_toolN = isset($_POST['next_one_name']) ? trim($_POST['next_one_name']) : '';

      $test3 = $cur_less_row_id + 1;
      $done = 1;

      $name = otutorUserTable('_les_order');
      $name2 = otutorUserTable('_saved_vid');
      $name3 = otutorUserTable('_tools');

      $insert_tool = otutorPrepare("INSERT INTO `$name3` (tool_name, tool_loc) VALUES (?, ?)");
      $insert_tool->bind_param("ss", $next_toolID, $next_toolN);
      $insert_tool->execute();
      $insert_tool->close();

      $insert_saved = otutorPrepare("INSERT INTO `$name2` (savdvid_name, savid_loc) VALUES (?, ?)");
      $insert_saved->bind_param("ss", $cur_less_name, $cur_less_id);
      $insert_saved->execute();
      $insert_saved->close();

      $count = otutorPrepare("UPDATE student_info_1 SET tool_count = ? WHERE user_id = ?");
      $count->bind_param("ii", $test3, $user);
      $count->execute();
      $count->close();

      $finish = otutorPrepare("UPDATE `$name` SET les_stat = ? WHERE les_name = ?");
      $finish->bind_param("is", $done, $cur_less_name);
      $finish->execute();
      $finish->close();

      $advance = otutorPrepare("UPDATE `$name` SET cur_less = ? WHERE u_lesson_id = ?");
      $advance->bind_param("ii", $done, $test3);
      $advance->execute();
      $advance->close();

      echo '<p>' . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . ', you can re-watch the lesson you\'ve just completed. Find it <a href="fibon_saved.php">here</a>.</p><br>';
      echo '<p>You have unlocked the \'' . htmlspecialchars($next_toolN, ENT_QUOTES, 'UTF-8') . '\' tool. Find it in your <a href="fibon_concept.php">tools</a>.</p>';
      echo '<p>Your next video-lesson is ready. Find it <a href="fibon_fibon.php">here.</a></p><br>';
      echo '<p>Thank you for updating the database, '.  htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . '!</p>';
?>