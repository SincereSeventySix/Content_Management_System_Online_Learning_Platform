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

      $user = $_SESSION['user_id'];
      $test = $_POST['testVal'];

      $name = $user . $_SESSION['username'] . '_les_order';
      $id = 'u_lesson_id';
      $l_name = 'les_name';
      $l_loc = 'les_loc';
      $l_stat = 'les_stat';
      $l_cur = 'cur_less';

      $name2 = $user . $_SESSION['username'] . '_saved_vid';
      $id2 = 'u_saved_id';
      $sav_name = 'savdvid_name';
      $sav_loc  = 'savid_loc';

      $name3 = $user . $_SESSION['username'] . '_tools';
      $id3 = 'u_tools_id';
      $tool_name = 'tool_name';
      $tool_loc  = 'tool_loc';

      $name4 = $user . $_SESSION['username'] . '_games';
      $id4 = 'u_games_id';
      $game_name = 'game_name';
      $game_loc  = 'game_loc';

      $query = "CREATE TABLE {$name} ( $id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, $l_name VARCHAR(80) NOT NULL, $l_loc VARCHAR(60) NOT NULL, $l_stat TINYINT(1), $l_cur TINYINT(1));";
      $query .= "CREATE TABLE {$name2} ( $id2 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, $sav_name VARCHAR(60) NOT NULL, $sav_loc VARCHAR(100));";
      $query .= "CREATE TABLE {$name3} ( $id3 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, $tool_name VARCHAR(60) NOT NULL, $tool_loc VARCHAR(100));";
      $query .= "CREATE TABLE {$name4} ( $id3 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, $game_name VARCHAR(60) NOT NULL, $game_loc VARCHAR(100));";
      $query .= "INSERT INTO {$name3} ($tool_name, $tool_loc) VALUES ('tool_vow', 'Vowel-Tool');";
      $query .= "INSERT INTO {$name} ($l_name, $l_loc, $l_stat, $l_cur) VALUES ('Nouns: The Biggest Family', 'less_nouns1', 'false', true);";
      $query .= "INSERT INTO {$name} ($l_name, $l_loc, $l_stat, $l_cur) VALUES ('Pronouns: Professional Nouns', 'less_proN1', 'false', 'false');";
      $query .= "INSERT INTO {$name} ($l_name, $l_loc, $l_stat, $l_cur) VALUES ('Verbs: The Sentencevile Doers', 'less_verbs1', 'false', 'false');";
      $query .= "INSERT INTO {$name} ($l_name, $l_loc, $l_stat, $l_cur) VALUES ('Adjectives: Fishing for Fun', 'less_adj1', 'false', 'false');";
      $query .= "UPDATE student_info_1 SET tool_count = '$test' WHERE user_id = $user;";
      $query .= "UPDATE student_info_1 SET test = '$test' WHERE user_id = $user ";
  

    if (mysqli_multi_query($link, $query)) {
        do {
            if ($result = mysqli_store_result($link)) {
                while ($row = mysqli_fetch_array($result))
                {
                }
            }
        } while (mysqli_next_result($link));
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