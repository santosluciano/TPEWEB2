<?php
/**
 *
 */
  class MarcasModel extends Model
  {
    function getMarcas(){
      $sentencia = $this->db->prepare( "select * from marca");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function getMarca($id_marca){
      $sentencia = $this->db->prepare( "select * from marca where id_marca = ? limit 1");
      $sentencia->execute([$id_marca]);
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function borrarMarca($id_marca){
      $sentencia = $this->db->prepare( "delete from marca where id_marca=?");
      $sentencia->execute([$id_tarea]);
    }
    function cargarMarca($nombre, $descripcion){
      $sentencia = $this->db->prepare('INSERT INTO tarea(nombre,descripcion) VALUES(?,?)');
      $sentencia->execute([$nombre,$descripcion]);
    }
    function setNombreMarca($id_marca,$nombre){
      $sentencia = $this->db->prepare( "update marca set nombre=? where id_marca=?");
      $sentencia->execute([$nombre,$id_marca]);
    }
    function setDescripcionMarca($id_marca,$descripcion){
      $sentencia = $this->db->prepare( "update marca set descripcion=? where id_marca=?");
      $sentencia->execute([$descripcion,$id_marca]);
    }
  }

 ?>
