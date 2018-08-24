<?php
 // Modelos necesarios para generar la edicion .
 require_once("../modelos/asociacion.php"); 
 require_once("../modelos/usuario.php");
 require_once("../modelos/recurso.php");  
 require_once("../modelos/connection.php");



// Generamos la conexion con la base de datos .
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 
 // Generamos las colecciones necesarias para los usuarios a modificar . 
 $usuarios = Usuario::listAll();
 $recursos  = Recurso::listAll();
//
 ?>
<?php
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// obtenemos el ID de la asignacion . 
$id_asignacion = $_GET['id_asignacion'];
$sql = "SELECT *  FROM asignacion where id_asignacion = $id_asignacion";
$result = $conn->query($sql);

// Variables para obtener  valores de la TUPLA . 
$id_recurso = "null";
$id_usuario = "null ";
$id_rol = "null ";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id_usuario = $row["id_usuario"];
      $id_rol= $row["id_rol"];
      $id_recurso= $row["id_recurso"];
      $aUsuario = Usuario::load($id_usuario);
      $rRecurso = Recurso::load($id_recurso);

    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../include/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Editar asignaciones</h2>
        <div class="content">
          <form action="../controlador/update_asignacion.php" method="post">
            <div class="form-group">

  <label for="sel1">Usuario:</label>
  <select class="form-control" name="id_usuario">
  <?php 
   foreach ($usuarios AS $u)
{   ?>
 <option value="<?php echo $u['id_usuario'];?>" <?php if ($u["id_usuario"]==$aUsuario->getId_usuario()){ echo "selected";} ?>><?php echo "$u[email]"; ?></option>
<?php } ?>
  </select>

  <label for="sel1">Recurso : </label>
  <select class="form-control" name="id_recurso">
  <?php 

   foreach ($recursos AS $r)
{   ?>
 <option value="<?php echo $r['id_recurso'];?>" <?php if ($r["id_recurso"]==$rRecurso->getId_Recurso()){ echo "selected";} ?>><?php echo "$r[nombre]"; ?></option>
<?php } ?>
  </select>
</div>
<div class="form-group">
              <label>didentificador de la asignacion ID </label>
              <input class="form-control" type="text" name="id_asignacion" value="<?php echo $id_asignacion; ?>"  required ><br>
            </div>
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>

