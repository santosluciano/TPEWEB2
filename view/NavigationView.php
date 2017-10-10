<?php
  class NavigationView extends View
  {
    function mostrarIndex($marcas){
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->display('templates/index.tpl');
    }
    function mostrar_inicio(){
      return $this->smarty->display('templates/partial/inicio.tpl');
    }
    function mostrarCelulares($celulares){
      $this->smarty->assign('celulares',$celulares);
      return $this->smarty->display('templates/partial/celulares.tpl');
    }
    function mostrarCelular($celular){
      $this->smarty->assign('celular',$celular);
      return $this->smarty->display('templates/partial/celular.tpl');
    }
    function mostrarPanelAdmin(){
      $this->smarty->assign('encabezado','Panel de Administrador');
      $this->smarty->display('templates/Admin/index.tpl');
    }
  }

 ?>
