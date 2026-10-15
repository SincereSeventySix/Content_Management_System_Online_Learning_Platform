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

  function otutorPasswordHash($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  function otutorPasswordOk($password, $stored)
  {
    if (!is_string($stored) || $stored === '') return false;
    $info = password_get_info($stored);
    if ($info['algo'] !== 0) return password_verify($password, $stored);
    return hash_equals(strtolower($stored), sha1($password));
  }

  function otutorPrepare($sql)
  {
    global $connection;
    $stmt = $connection->prepare($sql);
    if (!$stmt) die("Fatal Error");
    return $stmt;
  }

  function otutorIdent($name)
  {
    if (!is_string($name) || !preg_match('/^[A-Za-z0-9_]+$/', $name)) die("Fatal Error");
    return $name;
  }

  function otutorUserTable($suffix)
  {
    $allowed = array('_les_order', '_saved_vid', '_tools', '_games');
    if (!in_array($suffix, $allowed, true)) die("Fatal Error");
    if (!isset($_SESSION['user_id'], $_SESSION['username'])) die("Fatal Error");
    $id = (int) $_SESSION['user_id'];
    $user = preg_replace('/[^A-Za-z0-9_]/', '', (string) $_SESSION['username']);
    if ($user === '') die("Fatal Error");
    return otutorIdent($id . $user . $suffix);
  }

  function otutorRows($sql, $types, $values)
  {
    $stmt = otutorPrepare($sql);
    if ($types !== '') {
      $bind = array($types);
      foreach ($values as $i => $value) {
        $bind[] = &$values[$i];
      }
      call_user_func_array(array($stmt, 'bind_param'), $bind);
    }
    $stmt->execute();
    $meta = $stmt->result_metadata();
    if (!$meta) {
      $stmt->close();
      return array();
    }
    $row = array();
    $refs = array();
    while ($field = $meta->fetch_field()) {
      $refs[] = &$row[$field->name];
    }
    call_user_func_array(array($stmt, 'bind_result'), $refs);
    $rows = array();
    while ($stmt->fetch()) {
      $copy = array();
      foreach ($row as $key => $value) $copy[$key] = $value;
      $rows[] = $copy;
    }
    $meta->free();
    $stmt->close();
    return $rows;
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
      $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }


  


  
?>
