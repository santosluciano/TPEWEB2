<?php
class LoginView extends View
{
  function mostrarLogin($error = ''){
    $this->smarty->assign('error', $error);
    return $this->smarty->display('templates/Login/index.tpl');
  }
  function mostrarError($error = ''){
    $this->smarty->assign('error', $error);
    return $this->smarty->display('templates/Login/error.tpl');
  }
}

 ?>
