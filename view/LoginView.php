<?php
class LoginView extends View
{
  function mostrarLogin($error = ''){
    $this->smarty->assign('error', $error);
    return $this->smarty->display('templates/Login/index.tpl');
  }
  function mostrarFormRegistrar(){
    return $this->smarty->display('templates/Login/formCrearCuenta.tpl');
  }
  function errorFormRegistro($error = ''){
    $this->smarty->assign('error', $error);
    return $this->smarty->display('templates/Login/formCrearCuenta.tpl');
  }
  function mostrarImagenPerfil($usuario){
    $this->smarty->assign('usuario',$usuario);
    return $this->smarty->display('templates/fotoperfil.tpl');
  }
}

 ?>
