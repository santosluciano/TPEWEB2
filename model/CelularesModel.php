<?php
/**
 *
 */
class CelularesModel extends Model
{
  function getCelulares(){
    $sentencia = $this->db->prepare( "select * from celular");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function getCelular($id_celular){
    $sentencia = $this->db->prepare( "select * from celular where id_celular = ? limit 1");
    $sentencia->execute([$id_celular]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function borrarCelular($id_celular){
    $sentencia = $this->db->prepare( "delete from celular where id_celular=?");
    $sentencia->execute([$id_celular]);
  }
  function cargarCelular($id_marca,$nombre,$caracteristicas,$precio){
    $sentencia = $this->db->prepare('INSERT INTO celular(nombre,caracteristicas,precio,id_marca) VALUES(?,?,?,?)');
    $sentencia->execute([$nombre,$caracteristicas,$precio,$id_marca]);
  }
  function setNombreCelular($id_celular,$nombre){
    $sentencia = $this->db->prepare( "update celular set nombre=? where id_celular=?");
    $sentencia->execute([$nombre,$id_celular]);
  }
  function setDescripcionCelular($id_celular,$descripcion){
    $sentencia = $this->db->prepare( "update celular set descripcion=? where id_celular=?");
    $sentencia->execute([$descripcion,$id_celular]);
  }
  function setPrecioCelular($id_celular,$precio){
    $sentencia = $this->db->prepare( "update celular set precio=? where id_celular=?");
    $sentencia->execute([$precio,$id_celular]);
  }
  function getCelularesMarca($id_marca){
    $sentencia = $this->db->prepare( "select * from celular WHERE id_marca=?");
    $sentencia->execute([$id_marca]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function buscarCelular($nombre){
    $sentencia = $this->db->prepare( "select * from celular WHERE nombre LIKE ?");
    $sentencia->execute(["%$nombre%"]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
