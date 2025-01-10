<?php

namespace app\core;

class Routes{


    private static  array  $routes = [];

    public static function get($url, $controller,$action){
    
        self::$routes[] = [
            'url'=> str_replace('/',"",$url),
            'controller'=>$controller,
            'actions'=> $action,
            'method'=> 'get'
        ];
        //var_dump($routes);
    }

    public static function post($url, $controller,$action){
        self::$routes[] = [
            'url'=> str_replace('/','',$url),
            'controller'=>$controller,
            //se espera um array, onde o a chave é o metodo na url, e seu valor a acao no servidor
            'actions'=> $action,
            'method'=> 'post'
        ];
    }

    public static function getRoutes(){
            //var_dump($routes);
            return self::$routes;
    }
    
    

}
