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


//  Routes::get('/pessoa',array(

//     '/ver'=>'chamar o controler'

//  ));