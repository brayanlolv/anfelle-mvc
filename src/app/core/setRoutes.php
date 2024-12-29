<?php

namespace app\core;



Routes::get('/','HomeController' ,array(
    ''=>'index'
 ));

Routes::get('/montador','MontadorController' ,array(
   ''=>'index',
   'consultar'=>'consult'
));


Routes::get('/pedidos','PedidosController' ,array(
   ''=>'index',
   'criar'=>'create',
   'add'=>'add',
   'editar'=>'edit',
   'update'=>'update',
   'pesquisar-por-afl'=>'searchByAfl',
   'pesquisar-por-nome'=>'searchByNome'
));

Routes::get('/usuario','UserController' ,array(
   ''=>'index',
   'login'=>'loginForm',
   'loging'=>'login',
   'deslog'=>'deslog'
   
));


//  Routes::get('/pessoa',array(

//     '/ver'=>'chamar o controler'

//  ));