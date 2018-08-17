<?php
include_once "../include/SeguridadBase.php";
class Asociacion  extends SeguridadBase {
// variales 
 protected $id_asignacion;
 protected $id_usuario;
 protected $id_recurso;
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

 // Asignaciones de usuarios con sus respectivos recursos.   
  public function listAll() {
    $query = Asociacion::connection()->prepare("SELECT *,usuario.email AS id_usuario , recurso.nombre as id_recurso ,rol.nombre as id_rol  from Asignacion inner join usuario on (asignacion.id_usuario = usuario.id_usuario)
      inner join recurso on (asignacion.id_recurso  = recurso.id_recurso)
      inner join rol on (asignacion.id_rol = rol.id_rol )");
    $query->execute();
    return $query->fetchAll();
  }

  // Alta del recurso . 
  public function insert($id_usuario , $id_recurso,$id_rol ){
    $query = Asociacion::connection()->prepare("INSERT INTO asignacion (id_usuario , id_recurso ,id_rol) VALUES (?,?,?)");
    $query->execute(array($id_usuario , $id_recurso , $id_rol));
  
  }


  
  // MODIFICAR para la entidad de Recursos. 
  public function search($search_name, $search_last_name, $search_blocked) {
    $query = User::connection()->prepare("SELECT * FROM usuario WHERE (name LIKE ? AND last_name LIKE ? AND blocked = ?)");
    $query->execute(array("%$search_name%", "%$search_last_name%", $search_blocked));
    $users = $query->fetchAll();
  }

 // Cantidad de Recursos
  public function listCant() {
    $query = Asignacion::connection()->prepare("SELECT * FROM asignacion");
    $query->execute();
    return nt();
  }

// Eliminacion de usuario dado email 
  public function delete($id_asignacion) {
      $query = Asignacion::connection()->prepare("SELECT id_asignacion from asignacion WHERE (id_asignacion = ?)");
      $query->execute(array($id_asignacion));

  }


// Ejemplo de Eliminacion 
 // public function delete($email) {
   //   $query = Usuario::connection()->prepare("SELECT id from usuario WHERE (email = ?)");
   //  $query->execute(array($email));
  //}

// actualizar Asignacion de recursos para usuarios
  public function update($id_usuario,$id_recurso,$id_asignacion) {
    $query = Asignacion::connection()->prepare("UPDATE asignacion SET id_usuario = ?, id_recurso = ?  where (id_asignacion = ?) ");
    $query->execute(array($id_usuario , $id_recurso,$id_recurso));
  }

}
?>