<?php
  // Local Docker sets OTUTOR_LOCAL so this machine can use an empty
  // database password. A normal host keeps the password already stored here.
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', getenv('OTUTOR_LOCAL') ? '' : 'sincere76');
  define('DB_NAME', 'students');
?>
