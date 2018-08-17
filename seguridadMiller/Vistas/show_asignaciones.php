<?php
 //require_once("../modelos/Recurso.php");
 //require_once("../modelos/Usuario.php");
 require_once("../modelos/Asociacion.php");
 require_once("../modelos/connection.php");

 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 
 //$recursos = Recurso::listAll(); 
 //$usuarios = Usuario::listAll(); 
 $asignaciones = Asociacion::listAll(); 
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Asignaciones</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
   <?php include '../include/navbar.php';?>

<div class="container">
</div>
          <center>
 <a href="../vistas/add_asignacion.php"  class="btn btn-primary" role="button">Agregar</a></center>       
<div class="container">
  <center> </center><h2>Asignacion</h2> </center>
  <p> </p>
  <table class="table">
    <thead>
      <tr>
        <th>Usuario</th>
        <th>recurso</th>
        <th>rol</th>
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($asignaciones AS $a)
{   ?>
      <tr>
        <td><?php echo  $a["id_usuario"] ?></td>
        <td><?php echo  $a["id_recurso"] ?></td>
        <td><?php echo  $a["id_rol"] ?></td>
       <!--Si sos Administrador  --> 

       <!-- Si  no es admin no puede hacer nada con los usuarios -->    
        <th><a  href="../vistas/delete_asignacion.php?id_asignacion=<?php echo  $a["id_asignacion"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../vistas/edit_asignacion.php?id_asignacion=<?php echo  $a["id_asignacion"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>

               

  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>

