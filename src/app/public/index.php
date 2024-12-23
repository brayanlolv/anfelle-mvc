<?php
  require dirname(dirname(dirname(__FILE__))) .  '\autoload.php'; //eu mesmo nao achei isso bonito, mas é a vida :(
  require_once dirname(dirname(__FILE__)) .  '\core\setRoutes.php'; //mudar isso aqui




  use app\core\Controller;
  use app\core\Routes;



  // echo "cpf teste é op meu ". var_dump(cpf('26496676801'));

  //Controller::dispatch();
  Controller::dispatch();
  //Controller::instantiateController();


