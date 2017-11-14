<?php
/**
 *
 */
class ImagenesModel extends Model
{
  function storeImagenes($id_celular,$imagenes){
    $rutas = $this->subirImagenes($imagenes);
    $sentencia_imagenes = $this->db->prepare('INSERT INTO imagen(fk_id_celular,ruta) VALUES(?,?)');
    foreach ($rutas as $ruta) {
      $sentencia_imagenes->execute([$id_celular,$ruta]);
    }
  }
  private function subirImagenes($imagenes){
    $rutas = [];
    foreach ($imagenes as $imagen) {
      $destino_final = 'images/' . uniqid() . '.png';
      move_uploaded_file($imagen, $destino_final);
      $rutas[]=$destino_final;
    }
    return $rutas;
  }
  function setImagen($id_imagen,$imagen){
    $destino_final = 'images/' . uniqid() . '.jpg';
    move_uploaded_file($imagen, $destino_final);
    $sentencia = $this->db->prepare('update imagen set ruta=? where id_imagen=?');
    $sentencia->execute([$destino_final,$id_imagen]);
    return $this->getImagen($id_imagen);
  }
  function getImagen($id_imagen){
    $sentencia = $this->db->prepare( "select * from imagen WHERE id_imagen=?");
    $sentencia->execute([$id_imagen]);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function cantImagenesCelular($id_celular){
    $sentencia = $this->db->prepare("select COUNT(*) from imagen where fk_id_celular=?");
    $sentencia->execute([$id_celular]);
    return $sentencia->fetch();
  }
  function delete($id_imagen){
    $sentencia = $this->db->prepare("DELETE from imagen where id_imagen=?");
    $sentencia->execute([$id_imagen]);  
  }
}

?>
