<?php
  class MarcasView extends View
  {
    function mostrar_marcas($marcas){
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->display('templates/index.tpl');
    }
  }

 ?>
