<?php
  class MarcasView extends View
  {
    function mostrarMarcas($marcas){
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->assign('encabezado','Listado de Marcas');
      $this->smarty->display('templates/Admin/marcas.tpl');
    }
    function mostrarCrearMarca(){
      $this->assignarForm();
      $this->smarty->assign('encabezado','Crear nueva marca');
      $this->smarty->assign('action','guardarMarca');
      $this->smarty->assign('accion','Crear');
      $this->smarty->display('templates/Admin/formCrearMarca.tpl');
    }
    private function assignarForm($nombre='', $descripcion=''){
      $this->smarty->assign('nombre', $nombre);
      $this->smarty->assign('descripcion', $descripcion);
    }
    function errorCrearMarca($error, $nombre, $descripcion, $accion){
      $this->assignarForm($nombre, $descripcion);
      $this->smarty->assign('error', $error);
      $this->smarty->assign('accion',$accion);
      $this->smarty->assign('encabezado','Crear nueva marca');
      $this->smarty->assign('action','guardarMarca');
      $this->smarty->display('templates/Admin/formCrearMarca.tpl');
    }
    function mostrarActualizarMarca($nombre,$descripcion,$id_celular){
      $this->assignarForm($nombre,$descripcion);
      $this->smarty->assign('action',"setMarca/$id_celular");
      $this->smarty->assign('accion','Modificar');
      $this->smarty->assign('encabezado','Modificar marca');
      $this->smarty->display('templates/Admin/formCrearMarca.tpl');
    }
  }

 ?>
