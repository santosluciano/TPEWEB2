<?php
/**
 *
 */
  class UsuariosModel extends Model
  {
    function getUsuario($userName){
      $sentencia = $this->db->prepare( "select * from usuario where nombre = ? limit 1");
      $sentencia->execute([$userName]);
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
    function getUsuarioID($id_usuario){
      $sentencia = $this->db->prepare( "select * from usuario where id_usuario = ? limit 1");
      $sentencia->execute([$id_usuario]);
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
    function getAll(){
      $sentencia = $this->db->prepare( "select * from usuario");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function store($usuario, $email, $password,$foto_perfil){
      $sentencia = $this->db->prepare('INSERT INTO usuario(nombre,email,password) VALUES(?,?,?)');
      $sentencia->execute([$usuario,$email,$password]);
    }
    function putAdmin($id_usuario){
      $sentencia = $this->db->prepare('update usuario set permiso_admin=1 where id_usuario=?');
      $sentencia->execute([$id_usuario]);
    }
    function quitAdmin($id_usuario){
      $sentencia = $this->db->prepare('update usuario set permiso_admin=0 where id_usuario=?');
      $sentencia->execute([$id_usuario]);
    }
    function delete($id_usuario){
      $sentencia = $this->db->prepare('DELETE from usuario where id_usuario=?');
      $sentencia->execute([$id_usuario]);
    }
    function changeImageProfile($usuario,$imagen){
      $destino_final = 'images/' . uniqid() . '.jpg';
      move_uploaded_file($imagen, $destino_final);
      $sentencia = $this->db->prepare('update usuario set imagen_perfil=? where usuario.nombre=?');
      $sentencia->execute([$destino_final,$usuario]);
    }
  }

 ?>
