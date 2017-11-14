<?php
  class UsuariosView extends View
  {
    function mostrarUsuarios($usuarios){
      $this->assignarIndex($usuarios,'','info');
      $this->smarty->display('templates/Admin/usuarios.tpl');
    }
    function mostrarEstado($usuarios,$estado,$alert){
        $this->assignarIndex($usuarios,$estado,$alert);
        $this->smarty->display('templates/Admin/usuarios.tpl');
    } 
    private function assignarIndex($usuarios,$estado,$alert){
        $this->smarty->assign('encabezado','Listado de Usuarios');
        $this->smarty->assign('usuarios',$usuarios);
        $this->assignarEstado($estado,$alert);
    }
    private function assignarEstado($estado,$alert){
        $this->smarty->assign('estado',$estado);
        $this->smarty->assign('alert',$alert);
    }   
    function mostrarImagenPerfil($usuario){
        $this->smarty->assign('usuario',$usuario);
        return $this->smarty->display('templates/imagen.tpl');
    }
    function mostrarFormRegistrar(){
        return $this->smarty->display('templates/Login/formCrearCuenta.tpl');
    }
    function errorFormRegistro($error = ''){
      $this->smarty->assign('error', $error);
      return $this->smarty->display('templates/Login/formCrearCuenta.tpl');
    }
  }
 ?>
