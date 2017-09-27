<?php
/**
 *
 */
class CelularesModel extends Model
{
  function getCelulares(){
    $sentencia = $this->db->prepare( "select * from celular");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function getCelularMarca($idmarca){
    $sentencia = $this->db->prepare( "select * from celular WHERE id_marca='$idmarca'");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
