<?php
  require_once("../modelos/connection.php");
  require_once("../modelos/rol.php");
  
  $connection = new Connection();
  $connection = $connection->getConnection();

  $nombre = $_POST['nombre'];
  $id_rol = $_POST['id_rol'];

  
$rol = new Rol();

  if(!empty($nombre) && !empty($id_rol)) {

    $rol->update($nombre,$id_rol);
   header('location:../vistas/show_roles.php');
  } else {
    echo " tenemos que evaluar en que casos no se puede modificar el valor";
  } 




?>