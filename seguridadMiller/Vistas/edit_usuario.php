<?php
 require_once("../modelos/usuario.php"); 
 require_once("../modelos/connection.php");
 require_once("../modelos/rol.php");

 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = Usuario::listAll();
 $roles = Rol::ListAll();
 ?>

<?php
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_usuario = $_GET['id_usuario'];

$sql = "SELECT *  FROM usuario where id_usuario = $id_usuario ";
$result = $conn->query($sql);

$nombre = "null ";
$apellido = "null ";
$email = "null ";
$clave = "null";
$id_rol = "null";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
      $apellido = $row["apellido"];
      $email = $row["email"];
      $clave = $row["clave"];
      $id_rol = $row["id_rol"];       
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
        <h4>Modificar usuario</h2>
        <div class="content">
          <form action="../controlador/update_usuario.php" method="post">
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="email" name="email" value="<?php echo " $email"; ?>" required><br>
            </div>
            <div class="form-group">
              <label>nombre</label>
              <input class="form-control" type="text" name="nombre" value="<?php echo " $nombre"; ?>" required><br>
            </div>

            <div class="form-group">
              <label>Apellido</label>
              <input class="form-control" type="text" name="apellido" value="<?php echo " $apellido"; ?>" required><br>
            </div>

<div class="form-group">
  <label for="sel1"></label>
  <select class="form-control" name="id_rol">
      <?php  foreach ($roles AS $r)
{   ?>
    <option value="<?php echo "$r[id_rol]"; ?> "><?php echo "$r[nombre]"; ?></option>
    <?php } ?>
  </select>
</div>


               <div class="form-group">
              <label>id</label>
              <input class="form-control"    type="text"  name="id_usuario" value="<?php echo "$id_usuario"; ?>" required><br>
            </div>
    

            <div class="form-group">
              <label>clave</label>
              <input class="form-control" type="password" name="clave" value="<?php echo "$clave"; ?>"  required><br>
            </div>

            <input type="submit"  class="btn btn-primary" role="button" value="Registrarse">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>