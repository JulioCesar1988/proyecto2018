<?php
 require_once("../modelos/usuario.php"); 
 require_once("../modelos/connection.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = Usuario::listAll(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Usuarios</title>
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
 <a href="../vistas/add_usuario.php"  class="btn btn-primary" role="button">Agregar</a></center>   
<div class="container">
  <h2>Usuarios </h2>
  <p> </p>
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>email</th>
        <th>clave</th>
        <th>apellido</th>
        <th>rol</th>     
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($usuarios AS $u)
{   ?>
      <tr>
        <td><?php echo  $u["nombre"]  ?></td>
        <td><?php echo  $u["email"]    ?></td>
        <td><?php echo  $u["clave"]    ?></td>
        <td><?php echo  $u["apellido"] ?></td> 
        <td><?php echo  $u["id_rol"]   ?></td>
      <th><a  href="../vistas/delete_usuario.php?id_usuario=<?php echo  $u["id_usuario"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../vistas/edit_usuario.php?id_usuario=<?php echo  $u["id_usuario"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>

