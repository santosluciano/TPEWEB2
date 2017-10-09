<?php
  class MarcasView extends View
  {
    function mostrarMarcas($marcas){
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->display('templates/Admin/marcas.tpl');
    }
    function mostrarCrearMarca(){
      $this->assignarForm();
      $this->smarty->display('templates/Admin/formCrearMarca.tpl');
    }
    private function assignarForm($nombre='', $descripcion=''){
      $this->smarty->assign('nombre', $nombre);
      $this->smarty->assign('descripcion', $descripcion);
    }
    function errorCrearMarca($error, $nombre, $descripcion){
      $this->assignarForm($nombre, $descripcion);
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/Admin/formCrearMarca.tpl');
    }
    function mostrarActualizarMarca($nombre,$descripcion){
      $this->assignarForm($nombre,$descripcion);
      $this->smarty->display('templates/Admin/formCrearMarca.tpl');
    }
  }

 ?>
