<?php
  class MarcasView extends View
  {
    function mostrarMarcas($marcas){
      $this->assignarIndex($marcas,'','info');
      $this->smarty->display('templates/Admin/marcas.tpl');
    }
    function mostrarEstado($marcas,$estado,$alert){
      $this->assignarIndex($marcas,$estado,$alert);
      $this->smarty->display('templates/Admin/marcas.tpl');
    }
    private function assignarIndex($marcas,$estado,$alert){
      $this->smarty->assign('encabezado','Listado de Marcas');
      $this->smarty->assign('marcas',$marcas);
      $this->assignarEstado($estado,$alert);
    }
    private function assignarEstado($estado,$alert){
      $this->smarty->assign('estado',$estado);
      $this->smarty->assign('alert',$alert);
    }
    function mostrarCrearMarca(){
      $this->assignarForm();
      $this->assignarAcciones('guardarMarca','Crear','Crear nueva marca');
      $this->smarty->display('templates/Admin/formMarca.tpl');
    }
    private function assignarAcciones($action,$accion,$encabezado){
      $this->smarty->assign('action',$action);
      $this->smarty->assign('accion',$accion);
      $this->smarty->assign('encabezado',$encabezado);
    }
    private function assignarForm($nombre='', $url=''){
      $this->smarty->assign('nombre', $nombre);
      $this->smarty->assign('url', $url);
    }
    function errorFormMarca($error,$nombre,$url,$action,$accion,$encabezado){
      $this->assignarForm($nombre, $url);
      $this->smarty->assign('error', $error);
      $this->assignarAcciones($action,$accion,$encabezado);
      $this->smarty->display('templates/Admin/formMarca.tpl');
    }
    function mostrarActualizarMarca($nombre,$url,$id_marca){
      $this->assignarForm($nombre,$url);
      $this->assignarAcciones("setMarca/$id_marca",'Modificar','Modificar marca');
      $this->smarty->display('templates/Admin/formMarca.tpl');
    }
  }

 ?>
