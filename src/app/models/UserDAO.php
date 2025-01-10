<?php
namespace app\models;

use app\config\Conn;
class UserDAO{

    private $conn;
    
    function __construct(){
        $this->conn = Conn::getInstance();
    }
    function getNameById($id){
        $sql = 'SELECT nome from usuarios WHERE id = :id';
        $stm =$this->conn ->prepare($sql);
        $stm->execute(['id'=>$id]);
        return $stm->fetch();
    }

     function getUserById($id){
        $sql = 'SELECT * from usuarios WHERE id = :id';
        $stm =$this->conn ->prepare($sql);
        $stm->execute(['id'=>$id]);
        return $stm->fetch();
    }
    
    function getUserByCpf($cpf){
        $sql = 'SELECT * from usuarios WHERE cpf = :cpf';
        $stm =$this->conn ->prepare($sql);
        $stm->execute(['cpf'=>$cpf]);
        return $stm->fetch();
        
        
    }

}