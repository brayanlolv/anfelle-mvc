<?php

namespace app\controllers;

use app\controllers\ContainerController; 
use app\models\UserDAO; 
class UserController extends ContainerController{

    private $userDAO;
    //depois por um argumento aqui
    function __construct(){
        $this->userDAO = new UserDAO;
    }


    public function index(){
        if($this->isLogged() > 0){
            return $this->redirect('');
        }
       $this->loginForm();
    }

    //cuspir formulario
    public function loginForm(){    
        //passar o hash para o formualrio
        $formToken = uniqid();
        $_SESSION['formToken'] = $formToken;
        $this->view('user\loginForm.php',$formToken);
    }



    //ler mais sobre isso
    public function deslog(){
        session_start();
        session_destroy();
        $this->redirect('');
     }
 

    //receber forulario
    public function login(){
            
        try{
                session_start();
                if( empty($_SESSION['formToken'])||$_POST['formToken']  != $_SESSION['formToken']){
                    throw new \Exception('deu ruim');
                }
          
 
                $cpf = $_POST['cpf'];
                //sanitizar, conferir se é valido no model

                $password = $_POST['password'];
                $user = $this->userDAO->getUserByCpf($cpf);
                if ($user && $user['senha'] == SHA1($password)){
                   
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'] ;
                //.  $_SERVER['HTTP_X_FORWARDED_FOR']
                $_SESSION['auth'] = true;               
                $_SESSION['role'] =  $user['role'];
                //adcionar time and last ping 
                //estudar mais sobre a confiuracoes de sessao
                $this->redirect('');
            }
            throw new \Exception("authentication failure");
        }catch (\Exception $e ){
                $this->redirect('/usuario');
        }
        
    }
  

}