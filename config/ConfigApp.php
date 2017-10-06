<?php
class ConfigApp{

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [
    ''=> 'NavigationController#index',
    'home'=> 'NavigationController#inicio',
    'celulares' => 'NavigationController#showCelulares',
    'login' => 'LoginController#index',
    'verificarUsuario' => 'LoginController#verify',
    'logout' => 'LoginController#destroy',
    'admin' => 'AdminController#index',
    'adminMarcas' => 'AdminController#Marcas',
    'eliminarMarca' => 'AdminController#destroy',
    'crearMarca' => 'AdminController#create',
    'guardarMarca' => 'AdminController#store'
  ];
}

 ?>
