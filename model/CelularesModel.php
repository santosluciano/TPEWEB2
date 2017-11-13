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
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function delete($id_celular){
    $sentencia = $this->db->prepare( "delete from celular where id_celular=?");
    $sentencia->execute([$id_celular]);
  }
  function store($id_marca,$nombre,$caracteristicas,$precio,$imagenes){
    $sentencia = $this->db->prepare('INSERT INTO celular(nombre,caracteristicas,precio,id_marca) VALUES(?,?,?,?)');
    $sentencia->execute([$nombre,$caracteristicas,$precio,$id_marca]);
    $id_celular = $this->db->lastInsertId();
    $this->storeImagenes($id_celular,$imagenes);
  }
  function storeImagenes($id_celular,$imagenes){
    $rutas = $this->subirImagenes($imagenes);
    $sentencia_imagenes = $this->db->prepare('INSERT INTO imagen(fk_id_celular,ruta) VALUES(?,?)');
    foreach ($rutas as $ruta) {
      $sentencia_imagenes->execute([$id_celular,$ruta]);
    }
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
  function setImagen($id_imagen,$imagen){
    $destino_final = 'images/' . uniqid() . '.jpg';
    move_uploaded_file($imagen, $destino_final);
    $sentencia = $this->db->prepare('update imagen set ruta=? where id_imagen=?');
    $sentencia->execute([$destino_final,$id_imagen]);
    return $this->getImagen($id_imagen);
  }
  function getImagen($id_imagen){
    $sentencia = $this->db->prepare( "select * from imagen WHERE id_imagen=?");
    $sentencia->execute([$id_imagen]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function setMarca($id_celular,$id_marca){
    $sentencia = $this->db->prepare( "update celular set id_marca=? where id_celular=?");
    $sentencia->execute([$id_marca,$id_celular]);
  }
  function getAllFromMarca($id_marca){
    $sentencia = $this->db->prepare( "select celular.* from celular, marca WHERE celular.id_marca=marca.id_marca AND marca.id_marca = ?");
    $sentencia->execute([$id_marca]);
    $celulares = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $this->getCelularesMarca($celulares);
  }
  function searchByName($nombre,$limite){
    $sentencia = $this->db->prepare( "select * from celular WHERE nombre LIKE ? limit $limite");
    $sentencia->execute(["%$nombre%"]);
    $celulares = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $this->getCelularesMarca($celulares);
  }
  function getAllInOrder(){
    $sentencia = $this->db->prepare( "select * from celular ORDER BY celular.id_marca ASC");
    $sentencia->execute();    
    $celulares = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $this->getCelularesMarca($celulares);
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
  function deleteEspecificaciones($id_celular){
    $sentencia = $this->db->prepare( "delete from especificacion_celular where id_celular=?");
    $sentencia->execute([$id_celular]);
  }
  function cantImagenesCelular($id_celular){
    $sentencia = $this->db->prepare("select COUNT(*) from imagen where fk_id_celular=?");
    $sentencia->execute([$id_celular]);
    return $sentencia->fetch();
  }
}

?>
