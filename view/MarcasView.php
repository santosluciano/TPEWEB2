<?php
  class MarcasView extends View
  {
    function mostrar_marcas($marcas){
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->display('templates/index.tpl');
    }
    function mostrar_inicio(){
      return $this->smarty->display('templates/partial/inicio.tpl');
    }
    function mostrar_prueba(){
      return $this->smarty->display('templates/prueba.tpl');
    }
  }

 ?>
