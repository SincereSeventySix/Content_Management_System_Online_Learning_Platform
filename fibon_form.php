<?php
require_once('fibon_header_top.php');
require_once('fibon_nav_guest.php');
require_once('functions_fibon.php');
    $dbc = $connection;
    $error_msg = "";

// connecting to the database server before going on
    
    if (isset($_POST['submit'])) {

      $firstname = sanitizeString($_POST["firstname"]);
      $lastname = sanitizeString($_POST["lastname"]);
      $email = sanitizeString($_POST["email"]);
      $student_name = sanitizeString($_POST["studentname"]);
      $student_age = sanitizeString($_POST["studentage"]);
      $student_gender = sanitizeString($_POST["student_gen"]);
      $current_year = sanitizeString($_POST["curyear"]);
      $username = sanitizeString($_POST["username"]);
      $password1 = sanitizeString($_POST["password1"]);
      $password2 = sanitizeString($_POST["password2"]);
      $english_level = $_POST["english_lev"];

      $query = "INSERT INTO student_info_1 (first_name, last_name, email, student_name, student_age, student_gen, username, password, current_year, english_level, join_date, profile, test, tool_count )" .// this has to match the names in the database
      "VALUES ('$firstname', '$lastname', '$email', '$student_name', '$student_age', '$student_gender', '$username', SHA('$password2'), '$current_year', '$english_level', NOW(), '', false, '0')";

      $result = queryMysql($query)
                or die('Error querying database.');

      mysqli_close($dbc);

      echo '<p class="error">Thank you for enrolling your child, ' . $student_name . ' in Otutor. Check the email provided for your child\'s login information.</p><br />';
      
      //email to parents
      $to = 'usertest@localhost';// later this would be whatever email is entered in the form
      $subject = 'Classname Enrollment Successful';
      // this is one long string broken up over several lins for clarity,
      // its held together with " " and .
      $msg = "Welcome to Classname. \n" .
      "Your child, $student_name may login to Classname with the username:'$username' and the password:'$password2'. Please use these to log in to Classname.";
       mail($to, $subject, $msg, 'From:' . $email);

       //email to admin
      $to = 'noreply@localhost'; // later this will be the email submitted with the form
      $subject = 'New Classname Enrollment';
      // this is one long string broken up over several lins for clarity,
      // its held together with " " and .
      $msg = "$student_name has been enrolled in Classname. \n" .
      "Contact parents at $email for orientation appointment.";
       mail($to, $subject, $msg, 'From:' . $email);  
    }

echo <<<_END
<div id="form_wrap1">
    <h1 class="form">Otutor Enrollment Form</h1>
    <h3 class="form">Complete the form to get started at Otutor</h3>

    <form method="post" onsubmit="return validate(this)"  action="fibon_form.php">
      <div id="wrapform">
      <table>
        <tr>
          <th><label for="firstname">First name:</label></th>
          <td><input type="text" id="firstname" name="firstname" /><br /></td>
        </tr>
        <tr>
          <th><label for="lastname">Last name:</label></th>
          <td><input type="text" id="lastname" name="lastname" /><br /></td>
        </tr>
        <tr>
          <th><label for="email">Email Address:</label></th>
          <td><input type="text" id="email" name="email" /><br /></td>
        </tr>
        <tr>
          <th><label for="studentname">Student Name:</label></th>
          <td><input type="text" id="studentname" name="studentname" /><br /></td>
        </tr>
        <tr>
          <th><label for="studentage">Student Age:</label></th>
          <th><input type="text" id="studentage" name="studentage" /><br /></th>
        </tr>
        <tr>
          <th><label for="student_gen">Student Gender:</label></th>
          <th><input type="text" id="student_gen" name="student_gen" /><br /></th>
        </tr>
        <tr>
          <th><label for="curyear">Current School Year:</label></th>
          <td><input type="text" id="curyear" name="curyear" /><br /></td>
        </tr>
        <tr>
          <th><label for="english_lev">English Level:</label></th>
          <td>Intermediate <input id="english_lev" name="english_lev" type="radio" value="Intermediate" /> </td>
          <td>Fluent <input id="english_lev" name="english_lev" type="radio" value="Fluent" /> <br /> </td>
        </tr>
        <tr>
          <th><label for="username">Child's Username:</label></th>
          <td><input type="text" id="username" name="username" /><br /></td>
        </tr>
        <tr>
          <th><label for="password1">Password:</label></th>
          <td><input type="password" id="password1" name="password1" /><br /></td>
        </tr>
        <tr>
          <th><label for="password2">Password (retype):</label></th>
          <td><input type="password" id="password2" name="password2" /><br /></td>
        </tr>
        </table>

      </div>
      <input id="SubBut" type="submit" value="Submit Form" name="submit" />
    </form>
    </div>


  </body>
   <script src="scripts/utils.js"></script>
   <script src="scripts/fibon.js"></script>
</html>
_END;
?>