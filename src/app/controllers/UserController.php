<?php

namespace app\controllers;

echo 'controler puxado';
use app\controllers\ContainerController; 
use app\daos\UserDAO; 
class UserController extends ContainerController{

    private $userDAO;
    //depois por um argumento aqui
    function __construct(){
        $this->userDAO = new UserDAO;
    }


    public function index(){
        if($this->isLogged){
            return $this->redirect('');
        }
       $this->loginForm();
    }

    //cuspir formulario
    public function loginForm(){    
        //passar o hash para o formualrio
        if($this->isLogged()){
            return $this->redirect('');
        }

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
 
    // public function SignUp(){

    // }

    //receber forulario
    public function login(){
            
        try{
                session_start();
                if($_POST['formToken']  != $_SESSION['formToken']){
                   echo 'estranho';
                    throw new \Execption('deu ruim');
                }
          
 
                $cpf = $_POST['cpf'];
                //sanitizar, conferir se é valido no model

                $password = $_POST['password'];
                $user = $this->userDAO->getUserByCpf($cpf);
                // var_dump($user);[
                
                //melhorar esse isset
                if (isset($user) && $user['senha'] == SHA1($password)){
                    // echo 'tamo logado tamo logado';
                   
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'] ;
                //.  $_SERVER['HTTP_X_FORWARDED_FOR']
                $_SESSION['auth'] = true;
                
                //por um redirect ?
                //adcionar time and last ping 
                //estudar mais sobre a confiuracoes de sessao

                $this->redirect('');

                
            }
        }catch (\Exeception $e ){
                $this->redirect('/usuario');
        }
        
    }
  

}