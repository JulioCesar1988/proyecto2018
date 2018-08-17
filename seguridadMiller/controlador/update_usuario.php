<?php
  require_once("../modelos/connection.php");
  require_once("../modelos/usuario.php");
  
  $connection = new Connection();
  $connection = $connection->getConnection();

  $email = $_POST['email'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $clave = $_POST['clave'];
  $id_usuario = $_POST['id_usuario'];
  $id_rol = $_POST['id_rol'];
  
$users = new Usuario(); 
  if(!empty($email) && !empty($nombre) && !empty($clave)&&!empty($id_rol) ) {
    $users->update($email, $nombre,$apellido,$clave,$id_rol,$id_usuario);
   header('location:../vistas/show_usuarios.php');
  } else {
    echo " si no puedo generar la modificacion vamos a ir a otra pagina";
  } 




?>
