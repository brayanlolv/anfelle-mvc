<?php
namespace app\controllers;


use app\controllers\ContainerController;

echo ' home carregado';
class HomeController extends ContainerController{
    public function index(){
      if($this->isLogged()){
        return $this->view("\home\logged.php",null);
      }
      $this->view("\home\desloged.php",null);
    }
}