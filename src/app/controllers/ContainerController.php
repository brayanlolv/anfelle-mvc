<?php

namespace app\controllers;

class ContainerController {

    protected function view($view,$data){
        $data = $data;
        require dirname(dirname(__FILE__)) .'\views\\'.$view;

    }

    protected function isLogged(){
        
        //se supostamente existe uma sessao
        session_start();
        //pensar se essa !session_id é o que eu quero
        if(isset($_SESSION['IP'])){
            //se bater o endereco de ip
            
            if($_SERVER['REMOTE_ADDR'] == $_SESSION['IP'] && $_SESSION['auth'] ){
                // . $_SERVER['HTTP_X_FORWARDED_FOR'] 
                return  $_SESSION['role'];
            }
            //talvez adicionar um temp o melhor
        }
        return 0;
    }

    protected function redirect($endpoint,$status = 301){
        header('Location: http://'.$_SERVER['HTTP_HOST'] . $endpoint, true ,$status);
    }

    protected function validatePagination($value){
        if (filter_var($value, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))){
            return (int)$value;
        }
        return 1;//mandar para a primeira pagina
    }
}