<?php
namespace app\core;
use app\core\setRoutes;




class Routes{


    private static  array  $routes = [];

    public static function get($url, $controller,$action){
    
        self::$routes[] = [
            'url'=> str_replace('/',"",$url),
            'controller'=>$controller,
            'actions'=> $action,
            'method'=> 'get'
        ];
    }

    public static function post($url, $controller,$action){
        self::$routes[] = [
            'url'=> str_replace('/','',$url),
            'controller'=>$controller,
            'actions'=> $action,
            'method'=> 'post'
        ];
    }

    public static function getRoutes(){
            //var_dump($routes);
            return self::$routes;
    }
}
Routes::get('/','HomeController' ,array(
    ''=>'index'
 ));

Routes::get('/montador','MontadorController' ,array(
   ''=>'index',
   'consultar'=>'consult'
));

Routes::get('/pedidos','PedidosController' ,array(
   ''=>'index',
   'lista'=>'list',
   'criar'=>'create',
   'add'=>'add',
   'editar'=>'edit',
   'update'=>'update',
   'detalhes'=>'details',
   'pesquisar'=>'search',
   
));

Routes::get('/usuario','UserController' ,array(
   ''=>'index',
   'login'=>'loginForm',
   'loging'=>'login',
   'deslog'=>'deslog'
   
));
