<?php
define('ACTION', 0);
define('PARAMS', 1);

require_once 'config/ConfigApp.php';
require_once 'model/Model.php';
require_once 'view/View.php';
require_once 'controller/Controller.php';
require_once 'controller/SecuredController.php';
require_once 'controller/NavigationController.php';
require_once 'controller/MarcasController.php';
require_once 'controller/CelularesController.php';
require_once 'controller/LoginController.php';


function parseURL($url)
{
  $urlExploded = explode('/', $url);
  $arrayReturn[ConfigApp::$ACTION] = $urlExploded[ACTION];
  $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[PARAMS]) ? array_slice($urlExploded,1) : null;
  return $arrayReturn;
}

if(isset($_GET['action'])){
   $urlData = parseURL($_GET['action']);
    $action = $urlData[ConfigApp::$ACTION]; //home
    if(array_key_exists($action,ConfigApp::$ACTIONS)){
        $params = $urlData[ConfigApp::$PARAMS];
        $action = explode('#',ConfigApp::$ACTIONS[$action]); //Array[0] -> TareasController [1] -> index
        $controller =  new $action[0]();
        $metodo = $action[1];
        if(isset($params) &&  $params != null){
            echo $controller->$metodo($params);
        }
        else{
            echo $controller->$metodo();
        }
    }
}

 ?>
