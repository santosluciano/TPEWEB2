<?php
/**
 *
 */
  class ComentariosModel extends Model
  {
    function getAll(){
        $sentencia = $this->db->prepare( "select * from comentario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function getAllForCelular($id_celular){
        $sentencia = $this->db->prepare( "select * from comentario where fk_id_celular=?");
        $sentencia->execute([$id_celular]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function getComentario($id_comentario){
        $sentencia = $this->db->prepare( "select * from comentario where id_comentario=?");
        $sentencia->execute([$id_comentario]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function getAllForUsuario($id_usuario){
        $sentencia = $this->db->prepare( "select * from comentario where fk_id_usuario=?");
        $sentencia->execute([$id_usuario]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function borrarComentario($id_comentario){
        $sentencia = $this->db->prepare("DELETE from comentario where id_comentario=?");
        $sentencia->execute([$id_comentario]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
  }

 ?>
