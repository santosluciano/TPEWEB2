<?php
  class AdminView extends View
  {
    function mostrarPanelAdmin(){
      $this->smarty->display('templates/Admin/index.tpl');
    }
  }

 ?>
