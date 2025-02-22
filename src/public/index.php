<?php
  require dirname(dirname(__FILE__)) .  '\autoload.php'; //eu mesmo nao achei isso bonito, mas é a vida :(
  // require_once dirname(dirname(__FILE__)) .  '\core\setRoutes.php'; //mudar isso aqui

  use app\core\Controller;
  use app\core\Routes;

  Controller::dispatch();


