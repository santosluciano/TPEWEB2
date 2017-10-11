<?php
  class CelularesView extends View
  {
    function mostrarCelulares($celulares,$marcas){
      $this->smarty->assign('celulares',$celulares);
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->assign('encabezado','Listado de Celulares');
      $this->smarty->display('templates/Admin/celulares.tpl');
    }
    function mostrarCrearCelular($marcas){
      $this->assignarForm();
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->assign('id_celular',-1);
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
    function errorFormCelular($error,$nombre, $caracteristicas,$precio,$url,$marcas,$id_marca_celular,$action,$accion,$encabezado){
      $this->assignarForm($nombre,$caracteristicas,$precio,$url);
      $this->smarty->assign('error', $error);
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->assign('id_marca_celular',$id_marca_celular);
      $this->assignarAcciones($action,$accion,$encabezado);
      $this->smarty->display('templates/Admin/formCelular.tpl');
    }
    function mostrarActualizarCelular($nombre,$caracteristicas,$precio,$url,$id_celular,$id_marca,$marcas){
      $this->assignarForm($nombre,$caracteristicas,$precio,$url);
      $this->smarty->assign('marcas',$marcas);
      $this->assignarAcciones("setCelular/$id_celular",'Modificar','Modificar celular');
      $this->smarty->assign('id_marca_celular',$id_marca);
      $this->smarty->display('templates/Admin/formCelular.tpl');
    }
  }
 ?>
