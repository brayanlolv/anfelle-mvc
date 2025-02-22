<?php
namespace app\core;

use app\core\Routes;
use app\controllers;

class Controller{


    public static function  dispatch(){

        //é um array com as palavrasa chaves dividas por /
        //o $uri[0] é vazio, pois ele conta desde antes da primeira barra
        $routes = Routes::getRoutes();

        $uri =  explode("/",parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
       
        // dns / controller/ method/ argument
        
        
        $controller =  ['app\controllers\\','HomeController'];
        $method = 'index';
        $params;

        //fazer um for each nas rotas, e ver se acha uma url que bate
        foreach ($routes as $route) {

            if($route['url'] == $uri[1]){

             
                $controller[1] =  $route['controller'];
                if(!empty($uri[2])){
                    if(in_array($uri[2],array_keys($route['actions']))){
                        $method = $route['actions'][$uri[2]];
                    }break;
                }
            }
            
        }
        
        $classPath = $controller[0].$controller[1];
        $obj =  new $classPath;
        $obj->{$method}(isset($uri[3]) ? $uri[3]: NULL );
    }
}