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
        $sql = "select comentario.*,DATE_FORMAT(fecha_comentario,'%d-%m-%Y %H:%i:%s') AS fecha_comentario,usuario.nombre,usuario.imagen_perfil from comentario,usuario where fk_id_celular=? AND fk_id_usuario=id_usuario";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id_celular]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function getComentario($id_comentario){
        $sentencia = $this->db->prepare( "select comentario.*,DATE_FORMAT(fecha_comentario,'%d-%m-%Y %H:%i:%s') AS fecha_comentario,usuario.nombre,usuario.imagen_perfil from comentario,usuario where id_comentario=? AND fk_id_usuario=id_usuario");
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
    function guardarComentario($id_celular,$id_usuario,$texto_comentario,$nota_comentario){
        $sentencia = $this->db->prepare('INSERT INTO comentario(fk_id_celular,fk_id_usuario,texto_comentario,nota_comentario) VALUES(?,?,?,?)');
        $sentencia->execute([$id_celular,$id_usuario,$texto_comentario,$nota_comentario]);
        $id = $this->db->lastInsertId();
        return $this->getComentario($id);
    }
  }

 ?>