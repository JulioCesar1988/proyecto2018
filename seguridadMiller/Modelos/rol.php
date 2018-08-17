<?php
include_once "../include/SeguridadBase.php";
class Rol  extends SeguridadBase {

 protected $nombre;
 protected $id_rol;

 static public function load($id){
    $query = Rol::connection()->prepare("SELECT * FROM rol WHERE (id_rol = ?)");
    $query->execute(array($id));
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    $rol = new Rol();
    $rol->id_rol = $resultado["id_rol"];
    $rol->nombre = $resultado["nombre"];
    return $rol;
  }

// Obtenemos el ID del rol. 
public function getId_rol(){
  return $this->id_rol;
}

  // Buscamos el Recurso por nombre.  
  public function fetch($nombre){
    $query = Recurso::connection()->prepare("SELECT * FROM recurso WHERE (nombre = ?)");
    $query->execute(array($nombre));
    return $query->fetch();
  }

 // Lista de los Recursos.   
  public function listAll() {
    $query = Rol::connection()->prepare("SELECT * from rol");
    $query->execute();
    return $query->fetchAll();
  }

  // Alta del recurso . 
  public function insert($nombre ) {
    $query = Rol::connection()->prepare("INSERT INTO rol (nombre) VALUES (?)");
    $query->execute(array($nombre));
  
  }


  
  // MODIFICAR para la entidad de Recursos. 
  public function search($search_name, $search_last_name, $search_blocked) {
    $query = User::connection()->prepare("SELECT * FROM usuario WHERE (name LIKE ? AND last_name LIKE ? AND blocked = ?)");
    $query->execute(array("%$search_name%", "%$search_last_name%", $search_blocked));
    $users = $query->fetchAll();
  }

 // Cantidad de Recursos
  public function listCant() {
    $query = Rol::connection()->prepare("SELECT * FROM rol");
    $query->execute();
    return nt();
  }

// Eliminacion de usuario dado email 
  public function delete($id_rol) {
      $query = Rol::connection()->prepare("SELECT id_rol from rol WHERE (id_rol = ?)");
      $query->execute(array($id_recurso));

  }


// Actualizacion del Recurso .
  public function update($nombre,$id_rol) {
    $query = Rol::connection()->prepare("UPDATE rol SET nombre = ? where (id_rol = ?) ");
    $query->execute(array($nombre , $id_rol));
  }


}
?>