<?php 


spl_autoload_register(function ($class_name) {
    echo $class_name;
    include_once $class_name . '.php';
});

 use pasta\Teste;
// $classPath = 'pasta\Teste';
// use pasta;
$className= 'pasta\Teste';
$teste = new $className('ola, tudo bem');
// $teste = new Teste('ola, tudo bem');
$teste->oi();

