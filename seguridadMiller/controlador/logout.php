<?php
  session_start();
  session_unset();
  session_destroy();
//header('location:../views/list_cajas.php');
header('location:/seguridadMiller/index.php');

?>

