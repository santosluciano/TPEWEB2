<?php
  class ImagenesView extends View
  {
    public function mostrarImagenes($imagenes,$id_celular){
      $this->smarty->assign('imagenes',$imagenes);
      $this->smarty->assign('id_celular',$id_celular);
      $this->smarty->assign('encabezado','Modificar Imagenes');
      $this->smarty->display('templates/Admin/formImagenes.tpl');
    }
    public function errorFormImagenes($error,$imagenes,$id_celular){
      $this->smarty->assign('imagenes',$imagenes);
      $this->smarty->assign('id_celular',$id_celular);
      $this->smarty->assign('encabezado','Modificar Imagenes');
      $this->smarty->assign('error',$error);
      $this->smarty->display('templates/Admin/formImagenes.tpl');
    }
  }
 ?>