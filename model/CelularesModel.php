<?php
/**
 *
 */
class CelularesModel extends Model
{
  function getAll(){
    $sentencia = $this->db->prepare( "select * from celular");
    $sentencia->execute();
    $celulares = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $celularesMarca = $this->getCelularesMarca($celulares);
    return $this->getImagenesCelular($celularesMarca);
  }
  private function getImagenesCelular($celulares){
    $celularesImagenes = [];
    foreach ($celulares as $celular) {
      $imagenes = $this->getImagenesCelularID($celular['id_celular']);
      $celular['imagenes'] = $imagenes;
      $celularesImagenes[] = $celular;
    }
    return $celularesImagenes; 
  }
  public function getImagenesCelularID($id_celular){
    $sentencia = $this->db->prepare( "select * from imagen where fk_id_celular=?");
    $sentencia->execute([$id_celular]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  private function getCelularesMarca($celulares){
    $celularesMarca = [];
    $sentencia = $this->db->prepare("select * from marca where id_marca = ?");
    foreach ($celulares as $celular) {
      $sentencia->execute([$celular['id_marca']]);
      $marca = $sentencia->fetch(PDO::FETCH_ASSOC);
      $celular['marca'] = $marca;
      $celularesMarca[] = $celular;
    }
    return $celularesMarca;
  }
  function get($id_celular){
    $sentencia = $this->db->prepare( "select * from celular where id_celular = ? limit 1");
    $sentencia->execute([$id_celular]);
    $celular = $sentencia->fetch(PDO::FETCH_ASSOC);
    $imagenes = $this->getImagenesCelularID($celular['id_celular']);
    $celular['imagenes'] = $imagenes;
    return $celular; 
  }
  function delete($id_celular){
    $sentencia = $this->db->prepare( "DELETE from celular where id_celular=?");
    $sentencia->execute([$id_celular]);
  }
  function store($id_marca,$nombre,$caracteristicas,$precio){
    $sentencia = $this->db->prepare('INSERT INTO celular(nombre,caracteristicas,precio,id_marca) VALUES(?,?,?,?)');
    $sentencia->execute([$nombre,$caracteristicas,$precio,$id_marca]);
    $id_celular = $this->db->lastInsertId();
    return $id_celular;
  }
  private function subirImagenes($imagenes){
    $rutas = [];
    foreach ($imagenes as $imagen) {
      $destino_final = 'images/' . uniqid() . '.png';
      move_uploaded_file($imagen, $destino_final);
      $rutas[]=$destino_final;
    }
    return $rutas;
  }
  function setNombre($id_celular,$nombre){
    $sentencia = $this->db->prepare( "update celular set nombre=? where id_celular=?");
    $sentencia->execute([$nombre,$id_celular]);
  }
  function setCaracteristicas($id_celular,$caracteristicas){
    $sentencia = $this->db->prepare( "update celular set caracteristicas=? where id_celular=?");
    $sentencia->execute([$caracteristicas,$id_celular]);
  }
  function setPrecio($id_celular,$precio){
    $sentencia = $this->db->prepare( "update celular set precio=? where id_celular=?");
    $sentencia->execute([$precio,$id_celular]);
  }
  function setMarca($id_celular,$id_marca){
    $sentencia = $this->db->prepare( "update celular set id_marca=? where id_celular=?");
    $sentencia->execute([$id_marca,$id_celular]);
  }
  function getAllFromMarca($id_marca){
    $sentencia = $this->db->prepare( "select celular.* from celular, marca WHERE celular.id_marca=marca.id_marca AND marca.id_marca = ?");
    $sentencia->execute([$id_marca]); 
    $celulares = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $celularesMarca = $this->getCelularesMarca($celulares);
    return $this->getImagenesCelular($celularesMarca);
  }
  function searchByName($nombre,$limite){
    $sentencia = $this->db->prepare( "select * from celular WHERE nombre LIKE ? limit $limite");
    $sentencia->execute(["%$nombre%"]);
    $celulares = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $celularesMarca = $this->getCelularesMarca($celulares);
    return $this->getImagenesCelular($celularesMarca);
  }
  function getAllInOrder(){
    $sentencia = $this->db->prepare( "select * from celular ORDER BY celular.id_marca ASC");
    $sentencia->execute();    
    $celulares = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $celularesMarca = $this->getCelularesMarca($celulares);
    return $this->getImagenesCelular($celularesMarca);
  }
  function getEspecificacion($id_celular){
    $sentencia = $this->db->prepare( "select * from especificacion_celular where id_celular = ? limit 1");
    $sentencia->execute([$id_celular]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function storeEspecificacion($especificaciones){
    $sentencia = $this->db->prepare( "INSERT INTO especificacion_celular(id_celular,pantalla,pantalla_dimension,peso,procesador,ram,memoria,sistema_operativo,conectividad,capacidad_bateria,camara,lector_huella,supercarga) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sentencia->execute($especificaciones);
  }
  function getEstadistica($id_celular){
    $sentencia = $this->db->prepare( "select * from estadisticas_celular where id_celular = ? limit 1");
    $sentencia->execute([$id_celular]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function guardarEstadistica($id_celular,$rendimiento,$conectividad,$disenio,$pantalla,$camara,$antutu){
    $sentencia = $this->db->prepare("INSERT INTO estadisticas_celular(id_celular,rendimiento,conectividad,disenio,pantall,camara,antutu) VALUES(?,?,?,?,?,?,?)");
    $sentencia->execute([$id_celular,$rendimiento,$conectividad,$disenio,$pantalla,$camara,$antutu]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function deleteEspecificaciones($id_celular){
    $sentencia = $this->db->prepare( "delete from especificacion_celular where id_celular=?");
    $sentencia->execute([$id_celular]);
  }
}

?>
