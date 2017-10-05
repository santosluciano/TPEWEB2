<?php
/**
 *
 */
  class LoginModel extends Model
  {
    function getUsuario($userName){
      $sentencia = $this->db->prepare( "select * from usuario where nombre = ? limit 1");
      $sentencia->execute([$userName]);
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
  }

 ?>
