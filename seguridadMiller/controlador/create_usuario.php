
<?php
 require_once("../modelos/usuario.php"); 
 require_once("../modelos/connection.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  

 ?>


<?php
 echo 'Llego al controlador';
  require_once("../modelos/connection.php");
  require_once("../modelos/usuario.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
 // Verificamos que datos nos llega 
 
 echo  " Emails ->".$_POST['email'];
 echo "  Nombre ->".$_POST['nombre'];
 echo " Apelliido ->".$_POST['apellido'];
 echo " clave ->".$_POST['clave'];
 echo " ID Rol ->".$_POST['id_rol'];
 




  $email = $_POST['email'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $clave = $_POST['clave'];
  $id_rol = $_POST['id_rol'];
  
  $usuario = new Usuario();
  if(!empty($email) && !empty($nombre) && !empty($apellido) && !empty($clave) && !empty($id_rol) ) {

  
    $usuario->insert($email, $nombre,$apellido,$clave,$id_rol);
  
    header('location:../vistas/show_usuarios.php');
  } else {
    echo "No se puedo insertar elemento. ";
  }

?>
