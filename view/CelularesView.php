<?php
  class CelularesView extends View
  {
    function mostrarCelulares($celulares){
      $this->smarty->assign('celulares',$celulares);
      $this->smarty->display('templates/Admin/celulares.tpl');
    }
    function mostrarCrearCelular($marcas){
      $this->assignarForm();
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->display('templates/Admin/formCrearCelular.tpl');
    }
    private function assignarForm($nombre='',$caracteristicas='',$precio=''){
      $this->smarty->assign('nombre', $nombre);
      $this->smarty->assign('caracteristicas', $caracteristicas);
      $this->smarty->assign('precio', $precio);
    }
    function errorCrearCelular($error, $nombre, $caracteristicas,$precio,$marcas){
      $this->assignarForm($nombre,$caracteristicas,$precio);
      $this->smarty->assign('error', $error);
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->display('templates/Admin/formCrearCelular.tpl');
    }
  }
 ?>
