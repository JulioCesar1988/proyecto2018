<?php
  require_once("../modelos/connection.php");
  require_once("../modelos/recurso.php");
  
  $connection = new Connection();
  $connection = $connection->getConnection();

  $nombre = $_POST['nombre'];
  $ip = $_POST['ip'];
  $id_recurso = $_POST['id_recurso'];

  
$recurso = new Recurso(); 
  if(!empty($nombre) && !empty($ip)) {
    $recurso->update($nombre, $ip,$id_recurso);
   header('location:../vistas/show_recursos.php');
  } else {
    echo " si no puedo generar la modificacion vamos a ir a otra pagina";
  } 




?>