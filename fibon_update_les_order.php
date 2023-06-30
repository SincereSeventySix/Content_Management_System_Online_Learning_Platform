<?php
  require_once('functions_fibon.php');
  require_once('fibon_header_loggedin.php');
  require_once('fibon_login_checks.php');
  
  $error_msg = "";
  $error_msg = $_SESSION['username'] . ', Update and Save Your Progress!';
  echo '<p class="login">' . $error_msg . '</p>';

  $user = $_SESSION['user_id'];
  $name = $user . $_SESSION['username'] . '_les_order';
  $dbc = mysqli_connect("localhost", "root", "", "students");
  $query = "SELECT u_lesson_id, les_name, les_loc FROM $name WHERE les_stat= '0' AND cur_less= '1'";
  $data = mysqli_query($dbc, $query);
   
  if ($row = mysqli_fetch_array($data)) {
    $less_id = $row['u_lesson_id'];
    $less_name = $row['les_name'];
    $less_loc = $row['les_loc'];
  }
  mysqli_close($dbc);


  $centralDB = 'student_info_1';
  $dbc = mysqli_connect("localhost", "root", "", "students");
  $query = "SELECT tool_count FROM $centralDB WHERE user_id = '$user'";
  $data = mysqli_query($dbc, $query);

  if ($row = mysqli_fetch_array($data)) {
    $tool_count = $row['tool_count'];
  }
  $new_tool_id = $tool_count+1;
  mysqli_close($dbc);

  $toolDB = 'tool_central';
  $dbc = mysqli_connect("localhost", "root", "", "students");
  $query = "SELECT tool_name, tool_loc FROM $toolDB WHERE tool_id = '$new_tool_id'";
  $data = mysqli_query($dbc, $query);

  if ($row = mysqli_fetch_array($data)) {
    $next_one_id = $row['tool_name'];
    $next_one_name = $row['tool_loc'];
  }
  mysqli_close($dbc);

  echo <<<_END
  <div>
  <form method="post" action="les_order_update.php">
      
   <table style="visibility:hidden" id="testings1"> 
        <tr>
          <th><label for="True">Update:</label></th>
          <td><input name="cur_less_DB_id" type="text" value="$less_id" size="1" /> </td> 
          <th><label for="cur_less_name">Lesson Name:</label></th>
          <td><input name="cur_less_name" type="text" value="$less_name" size="28"/> </td>
          <th><label for="cur_less_loc_id">Lesson Id:</label></th>
          <td><input name="cur_less_loc_id" type="text" value="$less_loc" size="8" /> </td>
          <th><label for="next_one_id">Next Tool Id:</label></th>
          <td><input name="next_one_id" type="text" value="$next_one_id" size="8" /> </td>
          <th><label for="next_one_name">Next Tool Name:</label></th>
          <td><input name="next_one_name" type="text" value="$next_one_name" size="8" /> </td>
        </tr>
    </table> 
      <input type="submit" id="updateBut"  value="Update" name="submit"/>
    </form>
      <form action="fibon_fibon.php">
          <input type="submit" id="updateBut2"  href="fibon_fibon.php" value="Do Lesson Over" name="begin"/>
      </form>
  
   
  </div>
      
  </body>
  <script src="scripts/utils.js"></script>
  <script src="scripts/QA.js"></script>
</html>
_END;
?>