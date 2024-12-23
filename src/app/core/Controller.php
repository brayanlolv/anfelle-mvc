<?php
namespace app\core;

use app\core\Routes;

echo ' core controler ';

class Controller{


    public static function  dispatch(){

        //é um array com as palavrasa chaves dividas por /
        //o $uri[0] é vazio, pois ele conta desde antes da primeira barra
        $routes = Routes::getRoutes();

        $uri =  explode("/",parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
       
        
        $classPath = dirname(dirname(__FILE__)) .'\controllers\HomeController.php' ;//atribui o index, se achar muda, se nao esse pe o default
        //muito feio, talvez eu mude depois
        $controller =  'HomeController';
        $method = 'index';
        $params;

        //fazer um for each nas rotas, e ver se acha uma url que bate
        foreach ($routes as $route) {

            if($route['url'] == $uri[1]){
    
                //NAO SEI COMO, SÒ FUNCIONA ASSIM
                //INSTANCIANDO O CONTROLLER
                // $classPath =  dirname(dirname(__FILE__)) .'\controllers\\'.$route['controller'].'.php';
                $controller = 'app\controllers\\'.$route['controller'];
                //Procurar o metodo
                //NAO ESTA TESTADO
                if(!empty($uri[2])){
                    if(in_array($uri[2],array_keys($route['actions']))){
                        $method = $route['actions'][$uri[2]];
                    }break;
                }
            }
            
        }
        //instancia do controller

        //tirar esse include abaixo para usar o autoloader

        // include_once($classPath);
        // echo $classPath;
        $obj =  new $controller;
        $obj->{$method}($uri[3]);
        // $className = "HomeController";
        // if(class_exists($className)) $controller =  new $className;else{
        //     echo "deu ruim";
        // }
     

    }


}