<?php
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_recurso = $_GET['id_recurso'];
echo "$id_recurso";
// sql to delete a record
$sql = "DELETE FROM recurso WHERE id_recurso = $id_recurso ";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('location:../vistas/show_recursos.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>