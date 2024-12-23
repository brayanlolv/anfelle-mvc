<?php

namespace app\daos;


use app\config\Conn;
class UserDAO{

    private $conn;
    
    function __construct(){
        $this->conn = Conn::getInstance();
    }
    
    function getUserByCpf($cpf){
        $sql = 'SELECT * from usuarios WHERE cpf = :cpf';//talvez adicionar um limitador aqui
        $stm =$this->conn ->prepare($sql);
        $stm->execute(['cpf'=>$cpf]);
        return $stm->fetch();
        
        
    }

}