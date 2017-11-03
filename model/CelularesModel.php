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
    return $this->getCelularesMarca($celulares);
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
  function store($id_marca,$nombre,$caracteristicas,$precio,$url){
    $sentencia = $this->db->prepare('INSERT INTO celular(nombre,caracteristicas,precio,url_img,id_marca) VALUES(?,?,?,?,?)');
    $sentencia->execute([$nombre,$caracteristicas,$precio,$url,$id_marca]);
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
  function setUrl_img($id_celular,$url){
    $sentencia = $this->db->prepare( "update celular set url_img=? where id_celular=?");
    $sentencia->execute([$url,$id_celular]);
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
}

?>
