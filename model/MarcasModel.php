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
  }


 ?>
