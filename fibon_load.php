<?php
  session_start();

  require_once('functions_fibon.php');
  require_once('fibon_header_loggedin.php');
  require_once('fibon_login_checks.php');

  if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['username'] = $_COOKIE['username'];    
    }
  }
?>