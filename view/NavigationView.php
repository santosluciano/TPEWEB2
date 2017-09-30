<?php
  class NavigationView extends View
  {
    function mostrar_marcas($marcas){
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->display('templates/index.tpl');
    }
    function mostrar_inicio(){
      return $this->smarty->display('templates/partial/inicio.tpl');
    }
  }

 ?>
