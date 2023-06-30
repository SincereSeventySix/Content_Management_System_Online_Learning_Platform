<?php
  // Start the session
    require_once('functions_fibon.php');
    require_once('fibon_header_top.php');
    require_once('fibon_nav_guest.php');
    
    destroySession();
    session_start();

    $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
      // Connect to the database
      
      $dbc = $connection;

      // Grab the user-entered log-in data
      $user_username = sanitizeString($_POST['username']);
      $user_password = sanitizeString($_POST['password']);

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $query = "SELECT user_id, username FROM student_info_1 WHERE username = '$user_username' AND password = SHA('$user_password')";
        $data = queryMysql($query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + 60 * 60 * 1 * 1);
          setcookie('username', $row['username'], time() + 60 * 60 * 1 * 1);
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/fibon_fibon.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = "Sorry, you must enter a valid username and password to log in.";
          echo '<p class="error">'. $error_msg .'</p> <br />';
        }
      }
    }
  }
?>

   <form method="post" action="fibon_login.php">
     <fieldset id="log">
       <legend id="legend">Otutor Log In</legend>
       <table id="logInTable">
         <tr>
           <th><label for="username">Username:</label></th>
           <td><input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /></td>
         </tr>

         <tr>
          <th><label for="password">Password:</label></th>
          <td><input type="password" name="password" /></td>
        </tr>
     </table>
     </fieldset>
     <input id="logBut" type="submit"  value="Log In" name="submit" />
   </form>
 </body>
 <script src="scripts/utils.js"></script>
 <script src="scripts/fibon.js"></script>
 </html>