<?php

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $METHOD = 'method';
    public static $RESOURCES = [
      'tarea#GET' => 'TareasApi#get' //Ejemplo de como usar el route, no tengo en la pagina la funcion tarea
    ];

}

?>
