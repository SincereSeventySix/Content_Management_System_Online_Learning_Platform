<?php
  $dbhost = 'localhost';
  $dbname = 'students';// these variables connect to the database and tables
  $dbuser = 'root';
  $dbpass = '';

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);// creates the actual connection
  if ($connection->connect_error) die("Fatal Error");

define('GW_UPLOADPATH', 'userImages/');
define('GW_MAXFILESIZE', 64768);

  
  // below is a list of functions that will be called at various times in the webApp
  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    return $result;
  }

  function destroySession() // this function is called when the user logs out
  {
    if (isset($_SESSION['user_id']) ) { 
      $_SESSION=array();
        if (session_id() != "" || isset($_COOKIE[session_name()]))
           {
             setcookie(session_name(), '', time()-3600, '/');
           }
          session_destroy();
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/fibon_content_land.php';
          header('Location: ' . $home_url);
      }
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    if (get_magic_quotes_gpc())
      $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }


  


  
?>
