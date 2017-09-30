<?php
class ConfigApp{

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [
    ''=> 'MarcasController#index',
    'home'=> 'NavigationController#inicio'
  ];
}

 ?>
