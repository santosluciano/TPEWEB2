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
    function store($nombre, $url){
      $sentencia = $this->db->prepare('INSERT INTO marca(nombre,url_img) VALUES(?,?)');
      $sentencia->execute([$nombre,$url]);
    }
    function setNombre($id_marca,$nombre){
      $sentencia = $this->db->prepare( "update marca set nombre=? where id_marca=?");
      $sentencia->execute([$nombre,$id_marca]);
    }
    function setUrl_img($id_marca,$url){
      $sentencia = $this->db->prepare( "update marca set url_img=? where id_marca=?");
      $sentencia->execute([$url,$id_marca]);
    }
  }

 ?>
