<?php
  require_once('functions_fibon.php');
  require_once('fibon_header_loggedin.php');
  require_once('fibon_login_checks.php');
  
  $error_msg = "";
  $error_msg = $_SESSION['username'] . ', take the Otutor test to determine your lesson order!';
  echo '<p class="login">' . $error_msg . '</p>';

  echo <<<_END
<div>
  <form id="testings2" method="post" onsubmit="return validate2(this)" action="fibon_setup_setup1.php">
      
   <table id="testings1"> 
        <tr>
          <th><label for="english_lev">Test Taken:</label></th>
          <td>True<input name="testVal" type="radio" value="1" /> </td>
        </tr>
    </table> 
      <input type="submit" id="testSubmittest"  value="Submit Test" name="submit"/>
      <input type="button" id="testSubmit2test"  value="Start from beginning" name="begin"/>
  </form>
   
  </div>
      
  </body>
  <script src="scripts/utils.js"></script>
  <script src="scripts/fibon.js"></script>
  <script src="scripts/divhide.js"></script>
</html>
_END;
?>




 