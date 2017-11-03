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
    function mostrarEspecificacion($celular,$especificacion){
      $this->smarty->assign('especificacion',$especificacion);
      $this->smarty->assign('celular',$celular);
      $this->smarty->assign('encabezado','Especificacion');
      $this->smarty->display('templates/Admin/especificacion.tpl');
    }
    function mostrarCrearEspecificacion($id_celular){
      $this->assignarFormEspecificacion();
      $this->smarty->assign('id_celular',$id_celular);
      $this->assignarAcciones("guardarEspecificacion/$id_celular",'Cargar','Crear Especificacion');
      $this->smarty->display('templates/Admin/formEspecificacion.tpl');
    }
    private function assignarFormEspecificacion($especificaciones = []){
      if (empty($especificaciones)){
        for ($i = 0; $i <= 11; $i++) {
          $especificaciones[$i] = '';
        }
      }
      $this->smarty->assign('pantalla', $especificaciones['0']);
      $this->smarty->assign('pantalla_dimension', $especificaciones['1']);
      $this->smarty->assign('peso', $especificaciones['2']);
      $this->smarty->assign('procesador', $especificaciones['3']);
      $this->smarty->assign('ram', $especificaciones['4']);
      $this->smarty->assign('memoria', $especificaciones['5']);
      $this->smarty->assign('sistema_operativo', $especificaciones['6']);
      $this->smarty->assign('conectividad', $especificaciones['7']);
      $this->smarty->assign('capacidad_bateria', $especificaciones['8']);
      $this->smarty->assign('camara', $especificaciones['9']);
      $this->smarty->assign('lector_huella', $especificaciones['10']);
      $this->smarty->assign('supercarga', $especificaciones['11']);
    } 
  }
 ?>
