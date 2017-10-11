<?php
  class CelularesView extends View
  {
    function mostrarCelulares($celulares){
      $this->smarty->assign('celulares',$celulares);
      $this->smarty->assign('encabezado','Listado de Celulares');
      $this->smarty->display('templates/Admin/celulares.tpl');
    }
    function mostrarCrearCelular($marcas){
      $this->assignarForm();
      $this->smarty->assign('marcas',$marcas);
      $this->assignarAcciones("guardarCelular",'Crear','Crear celular');
      $this->smarty->display('templates/Admin/formCelular.tpl');
    }
    private function assignarForm($nombre='',$caracteristicas='',$precio='',$url=''){
      $this->smarty->assign('nombre', $nombre);
      $this->smarty->assign('caracteristicas', $caracteristicas);
      $this->smarty->assign('precio', $precio);
      $this->smarty->assign('url_img', $url);
    }
    private function assignarAcciones($action,$accion,$encabezado){
      $this->smarty->assign('action',$action);
      $this->smarty->assign('accion',$accion);
      $this->smarty->assign('encabezado',$encabezado);
    }
    function errorFormCelular($error,$nombre, $caracteristicas,$precio,$url,$marcas,$action,$accion,$encabezado){
      $this->assignarForm($nombre,$caracteristicas,$precio,$url);
      $this->smarty->assign('error', $error);
      $this->smarty->assign('marcas',$marcas);
      $this->assignarAcciones($action,$accion,$encabezado);
      $this->smarty->display('templates/Admin/formCelular.tpl');
    }
    function mostrarActualizarCelular($nombre,$caracteristicas,$precio,$url,$id_celular,$marcas){
      $this->assignarForm($nombre,$caracteristicas,$precio,$url);
      $this->smarty->assign('marcas',$marcas);
      $this->assignarAcciones("setCelular/$id_celular",'Modificar','Modificar celular');
      $this->smarty->display('templates/Admin/formCelular.tpl');
    }
  }
 ?>
