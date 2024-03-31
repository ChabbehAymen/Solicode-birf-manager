<?php
class Router
{
    // this array hold every route page in the application
    private static $routes = ['/'=>'/BP15/', 'error'=>'/BP15/404','login'=>'/BP15/login' ];

    public static function route(string $destination, array $params = null ):void
    {
        $direction ='';
        foreach (self::$routes as $name => $location){
            if ($destination === $name) $direction = $location;
            if ($params != null){
                foreach ($params as $key => $param) $direction.='?'.$key.'='.$param;
            }
            header('Location: '.$direction);
        }

    }

}