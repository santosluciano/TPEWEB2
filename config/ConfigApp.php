<?php
class ConfigApp{

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [
    ''=> 'NavigationController#index',
    'home'=> 'NavigationController#inicio',
    'celulares' => 'NavigationController#showCelulares',
    'celular' => 'NavigationController#showCelular',
    'login' => 'LoginController#index',
    'verificarUsuario' => 'LoginController#verify',
    'logout' => 'LoginController#destroy',
    'admin' => 'NavigationController#admin',
    'adminMarcas' => 'MarcasController#index',
    'eliminarMarca' => 'MarcasController#destroy',
    'crearMarca' => 'MarcasController#create',
    'guardarMarca' => 'MarcasController#store',
    'modificarMarca' => 'MarcasController#update',
    'setMarca' => 'MarcasController#set',
    'adminCelulares' => 'CelularesController#index',
    'eliminarCelular' => 'CelularesController#destroy',
    'crearCelular' => 'CelularesController#create',
    'guardarCelular' => 'CelularesController#store'
  ];
}

 ?>
