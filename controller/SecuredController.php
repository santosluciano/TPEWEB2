<?php
define('HOMEMARCAS', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/adminMarcas');
define('HOMECELULARES', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/adminCelulares');
define('HOMEUSUARIOS', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/adminUsuarios');

class SecuredController extends Controller
{
  function __construct()
  {
    $this->isActive();
  }
  function isActive(){
    if(!$this->userActive()){
      header('Location: '.login);
      die();
    }
  }
  function userActive(){
    session_start();
    if(isset($_SESSION['USER'])){
      if (time() - $_SESSION['LAST_ACTIVITY'] > 1000) {
        header('Location: '.logout);
        die();
      }
      $_SESSION['LAST_ACTIVITY'] = time();
      return true;
    }else{
      return false;
    }
  }
  function isConnect(){
    session_start(); 
    try {
      if(!isset($_SESSION['USER']))
       throw new Exception("La conexion expiro");
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
  function isAdmin(){
    return $_SESSION['ADMIN'] == 1; 
  }
}

?>
