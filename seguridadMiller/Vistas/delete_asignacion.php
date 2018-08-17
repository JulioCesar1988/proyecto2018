<?php
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_asignacion = $_GET['id_asignacion'];
echo "$id_asignacion";
// sql to delete a record
$sql = "DELETE FROM asignacion WHERE id_asignacion = $id_asignacion ";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('location:../vistas/show_asignaciones.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>