<?php
  require_once("../modelos/connection.php");
  require_once("../modelos/asociacion.php");
  
  $connection = new Connection();
  $connection = $connection->getConnection();


  $id_asignacion = $_POST['id_asignacion'];
  $id_usuario    = $_POST['id_usuario'];
  $id_recurso    = $_POST['id_recurso'];
  
  echo " Id de asignacion -> ".$id_asignacion;
  echo " Id de usuario -> ".$id_usuario;
  echo " Id de recurso -> ".$id_recurso;


$asociacion = new Asociacion(); 
  if(!empty($id_asignacion) && !empty($id_recurso) && !empty($id_usuario)) {
    $asociacion->update($id_usuario, $id_recurso,$id_asignacion);
   header('location:../vistas/show_asignaciones.php');
  } else {
    echo "No se pudo hacer la actualizacion de la asignacion , verique cambio .";
  } 




?>