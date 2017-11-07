<?php
  class NavigationView extends View
  {
    function mostrarIndex($marcas,$conectado){
      $this->smarty->assign('marcas',$marcas);
      $this->smarty->assign('hayConexion',$conectado);
      $this->smarty->display('templates/index.tpl');
    }
    function mostrar_inicio($celulares){
      $this->smarty->assign('celulares',$celulares);
      return $this->smarty->display('templates/inicio.tpl');
    }
    function mostrarCelulares($celulares){
      $this->smarty->assign('celulares',$celulares);
      return $this->smarty->display('templates/celulares.tpl');
    }
    function mostrarCelular($celular,$marca,$especificacion){
      $this->smarty->assign('celular',$celular);
      $this->smarty->assign('marca',$marca);
      $this->smarty->assign('especificacion',$especificacion);
      return $this->smarty->display('templates/celular.tpl');
    }
    function mostrarPanelAdmin(){
      $this->smarty->assign('encabezado','Panel de Administrador');
      $this->smarty->display('templates/Admin/index.tpl');
    }
    function mostrarError($error){
      $this->smarty->assign('error',$error);
      return $this->smarty->display('templates/error.tpl');
    }
    function mostrarSugerencias($celulares){
      $this->smarty->assign('celulares',$celulares);
      return $this->smarty->display('templates/buscador.tpl');
    }
    function mostrarDatosUsuario($usuario){
      $this->smarty->assign('usuario',$usuario);
      return $this->smarty->display('templates/usuario.tpl');
    }
  }

 ?>
