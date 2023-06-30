<?php
session_start();
require_once('functions_fibon.php');
if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['username'] = $_COOKIE['username'];    
    }
  }
    $dbc = $connection;
    $query = "UPDATE student_info_1 SET test = true WHERE user_id = '" . $_SESSION['user_id'] . "'";     
    $result = queryMysql($query)
              or die('Error querying database.');
              
    mysqli_close($dbc);
    echo '<p class="error">Thank you, ' . $_SESSION['username'] . 'the database has been updated.</p><br />'; 
?>
