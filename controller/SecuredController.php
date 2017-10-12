<?php
define('HOMEMARCAS', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/adminMarcas');
define('HOMECELULARES', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/adminCelulares');

class SecuredController extends Controller
{

  function __construct()
  {
    session_start();
    if(isset($_SESSION['USER'])){
      if (time() - $_SESSION['LAST_ACTIVITY'] > 100000) {
        header('Location: '.logout);
        die();
      }
      $_SESSION['LAST_ACTIVITY'] = time();
    }
    else {
      header('Location: '.login);
      die();
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
}

 ?>
