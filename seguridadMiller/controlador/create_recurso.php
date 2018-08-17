
<?php
 require_once("../modelos/recurso.php"); 
 require_once("../modelos/connection.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  

 ?>


<?php
 echo 'Llego al controlador re recursos ';
  require_once("../modelos/connection.php");
  require_once("../modelos/recurso.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
 // Recursos que doy de alta en el sistema , para que lo use los usuarios . 
 echo  " Nombre del recurso ->".$_POST['nombre'];
 echo "  ip recurso ->".$_POST['ip'];


  $nombre = $_POST['nombre'];
  $ip = $_POST['ip'];

  $recurso = new Recurso();
  if(!empty($nombre) && !empty($ip)) {

    $recurso->insert($nombre,$ip);
  
    header('location:../vistas/show_recursos.php');
  } else {
    echo "No se puedo insertar elemento. ";
  }

?>