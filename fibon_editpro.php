<?php
  require_once('functions_fibon.php');
  require_once('fibon_header_loggedin.php');
  require_once('fibon_login_checks.php');
  
  $error_msg = "";
  $error_msg = $_SESSION['username'] . ', customise you profile here!';
  echo '<p class="login">' . $error_msg . '</p>';

  echo <<<_END
<div id="picSelect">
  <form enctype="multipart/form-data" method="post" action="fibon_editpro.php">

    <label id="picLabel" for="profile">Picture:</label>
    <input id="profileBut" type="file" name="profile" />
    <hr />
    <input id="picSub" type="submit" value="Add" name="submit" />
  </form>
  </div>
  </body>
  <script src="scripts/utils.js"></script>
  <script src="scripts/fibon.js"></script>
  <script src="scripts/divhide.js"></script>
</html>
_END;
?>

<?php
 // Make sure the user is logged in before going any further.
 if (!isset($_SESSION['user_id'])) {
    echo '<p class="login">Please <a href="fibon_login.php">log in</a> to access this page.</p>';
    exit();
    }
    else {
      $error_msg = "Customise your profile here, " . $_SESSION['username'] . ".";
  }
?>
 
<?php
if (isset($_POST['submit'])) {

require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
     
  // Connect to the database

$user = $_SESSION['user_id'];
$profile = $_FILES['profile']['name']; // Grab the score data from the POST
$profile_type = $_FILES['profile']['type'];
$profile_size = $_FILES['profile']['size'];

if (!empty($profile)) {
  if ((($profile_type == 'image/gif') || ($profile_type == 'image/jpeg') ||
    ($profile_type =='image/pjpeg') || ($profile_type == 'image/png')) &&
      ($profile_size > 0) && ($profile_size <= GW_MAXFILESIZE)) {
        if ($_FILES['profile']['error'] == 0) {
          $target = GW_UPLOADPATH . $profile;
          if (move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
            
            $query = "UPDATE student_info_1 SET profile = '$profile' WHERE user_id = $user "; // Write the data to the database
            mysqli_query($dbc, $query);

            echo '<p>Thanks for adding a picture, '.  $_SESSION['username'] . '!</p>'; // Confirm success with the user
            echo '<p><a href="fibon_fibon.php">Return to Otutor</a></p>';

            $profile = ""; // Clear the score data to clear the form

            mysqli_close($dbc);
            }
            else 
            {
              echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
            }
          }
          else 
          {
            echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no ' .
              'greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';
          }
          @unlink($_FILES['profile']['tmp_name']);
          }
          else  
          {
            echo '<p class="error">Please enter all of the information to update your picture.</p>';
          }
        }
      }     

?>
