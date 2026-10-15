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
      $error_msg = "Take the test to start building your Otutor, " . $_SESSION['username'] . ".";
  }

      $link = mysqli_connect("localhost", "root", "", "students");

      $user = (int) $_SESSION['user_id'];
      $test = isset($_POST['testVal']) ? (int) $_POST['testVal'] : 0;

      $name = otutorUserTable('_les_order');
      $name2 = otutorUserTable('_saved_vid');
      $name3 = otutorUserTable('_tools');
      $name4 = otutorUserTable('_games');

      $query = "CREATE TABLE `$name` ( u_lesson_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, les_name VARCHAR(80) NOT NULL, les_loc VARCHAR(60) NOT NULL, les_stat TINYINT(1), cur_less TINYINT(1));";
      $query .= "CREATE TABLE `$name2` ( u_saved_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, savdvid_name VARCHAR(60) NOT NULL, savid_loc VARCHAR(100));";
      $query .= "CREATE TABLE `$name3` ( u_tools_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, tool_name VARCHAR(60) NOT NULL, tool_loc VARCHAR(100));";
      $query .= "CREATE TABLE `$name4` ( u_games_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, game_name VARCHAR(60) NOT NULL, game_loc VARCHAR(100));";
      $query .= "INSERT INTO `$name3` (tool_name, tool_loc) VALUES ('tool_vow', 'Vowel-Tool');";
      $query .= "INSERT INTO `$name` (les_name, les_loc, les_stat, cur_less) VALUES ('Nouns: The Biggest Family', 'less_nouns1', 0, 1);";
      $query .= "INSERT INTO `$name` (les_name, les_loc, les_stat, cur_less) VALUES ('Pronouns: Professional Nouns', 'less_proN1', 0, 0);";
      $query .= "INSERT INTO `$name` (les_name, les_loc, les_stat, cur_less) VALUES ('Verbs: The Sentencevile Doers', 'less_verbs1', 0, 0);";
      $query .= "INSERT INTO `$name` (les_name, les_loc, les_stat, cur_less) VALUES ('Adjectives: Fishing for Fun', 'less_adj1', 0, 0);";
  

    if (mysqli_multi_query($link, $query)) {
        do {
            if ($result = mysqli_store_result($link)) {
                while ($row = mysqli_fetch_array($result))
                {
                }
            }
        } while (mysqli_next_result($link));
            $mark = otutorPrepare("UPDATE student_info_1 SET tool_count = ?, test = ? WHERE user_id = ?");
            $mark->bind_param("iii", $test, $test, $user);
            $mark->execute();
            $mark->close();
            $error_msg = "";
            $error_msg = "Your Otutor is ready, " . $_SESSION['username'] . ".";
            echo '<p class="login">' . $error_msg . '</p>';
            echo '<p>'.  $_SESSION['username'] . ', your <a href="fibon_fibon.php">lesson order</a> is now compiled and ready to go!</p>';
            echo '<p>Your personal table, <a href="fibon_concept.php">My Tools</a> has been updated successfully.</p>';
            echo '<p>Your personal table, <a href="fibon_saved.php">My Saves</a> is ready to save your watched video-lessons.</p>';
            echo '<p>Your personal table, <a href="fibon_games.php">My Games</a> is ready to store your saved games.</p>';
            echo '<p>Thanks for updating the database, '.  $_SESSION['username'] . '!</p><br>'; // Confirm success with the user 
            echo '<p>You have unlocked the \'Vowel Tool\', find it in <a href="fibon_concept.php">My Tools</a>.</p><br>';
    }
    
?>