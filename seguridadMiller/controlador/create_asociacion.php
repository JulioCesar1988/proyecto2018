
<?php
 require_once("../modelos/recurso.php");
 require_once("../modelos/usuario.php");
 require_once("../modelos/Asociacion.php");
 require_once("../modelos/connection.php");

 $connection = new Connection(); 
 $connection = $connection->getConnection();  

 ?>


<?php
 echo 'Creacion de la asociacion de usuarios - recursos  ';
  
 
 echo  " ID del Usuario  ->".$_POST['id_usuario'];
 echo "  ID del Recurso  ->".$_POST['id_recurso'];
 echo "  ID del Rol  ->".$_POST['id_rol'];


  $id_usuario = $_POST['id_usuario'];
  $id_recurso = $_POST['id_recurso'];
  $id_rol = $_POST['id_rol'];


  $asociacion = new Asociacion();
  if(!empty($id_usuario) && !empty($id_recurso) &&!empty($id_rol) ) {

    $asociacion->insert($id_usuario,$id_recurso,$id_rol);
  
    header('location:../vistas/show_asignaciones.php');
  } else {
    echo "No se puedo insertar elemento.";
  }

?>