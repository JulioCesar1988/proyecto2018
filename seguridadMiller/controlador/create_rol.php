
<?php
 require_once("../modelos/rol.php"); 
 require_once("../modelos/connection.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  

 ?>


<?php
 echo 'Llego al controlador  ROL';
  require_once("../modelos/connection.php");
  require_once("../modelos/rol.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
 // Recursos que doy de alta en el sistema , para que lo use los usuarios . 
 echo  " Nombre del recurso ->".$_POST['nombre'];


  $nombre = $_POST['nombre'];

  $rol = new Rol();
  if(!empty($nombre)) {

    $rol->insert($nombre);
  
    header('location:../vistas/show_roles.php');
  } else {
    echo "No se puede agregar el rol , en el sistema.";
  }

?>