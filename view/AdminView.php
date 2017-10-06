<?php
  class AdminView extends View
  {
    function mostrarPanelAdmin(){
      $this->smarty->display('templates/Admin/index.tpl');
    }
    function mostrarMarcas($marcas){
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->display('templates/Admin/marcas.tpl');
    }
    function mostrarCrearMarca(){
      $this->assignarMarcaForm();
      $this->smarty->display('templates/Admin/formCrearMarca.tpl');
    }
    private function assignarMarcaForm($nombre='', $descripcion=''){
      $this->smarty->assign('nombre', $nombre);
      $this->smarty->assign('descripcion', $descripcion);
    }
    function errorCrearMarca($error, $nombre, $descripcion){
      $this->assignarMarcaForm($nombre, $descripcion);
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/Admin/formCrearMarca.tpl');
    }
  }

 ?>
