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
    function store($usuario, $email, $password,$foto_perfil){
      $sentencia = $this->db->prepare('INSERT INTO usuario(nombre,email,password,foto_perfil) VALUES(?,?,?,?)');
      $sentencia->execute([$usuario,$email,$password,$foto_perfil]);
    }
  }

 ?>
