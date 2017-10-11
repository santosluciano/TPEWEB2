<?php
/**
 *
 */
  class MarcasModel extends Model
  {
    function getAll(){
      $sentencia = $this->db->prepare( "select * from marca");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function get($id_marca){
      $sentencia = $this->db->prepare( "select * from marca where id_marca = ? limit 1");
      $sentencia->execute([$id_marca]);
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function delete($id_marca){
      $sentencia = $this->db->prepare( "delete from marca where id_marca=?");
      return $sentencia->execute([$id_marca]);
    }
    function store($nombre, $descripcion){
      $sentencia = $this->db->prepare('INSERT INTO marca(nombre,descripcion) VALUES(?,?)');
      $sentencia->execute([$nombre,$descripcion]);
    }
    function setNombre($id_marca,$nombre){
      $sentencia = $this->db->prepare( "update marca set nombre=? where id_marca=?");
      $sentencia->execute([$nombre,$id_marca]);
    }
    function setDescripcion($id_marca,$descripcion){
      $sentencia = $this->db->prepare( "update marca set descripcion=? where id_marca=?");
      $sentencia->execute([$descripcion,$id_marca]);
    }
  }

 ?>
