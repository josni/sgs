<?php
session_start();
session_destroy();
session_unset();
header ('Location: login.php');
?>
<html>
  <head>

  <title>Logout</title>
  </head>
<body>
    
 </body>
</html>
