<?php
namespace app\models;

use app\config\Conn;
class UserDAO extends Model{

    protected $conn;
    
    function __construct(){
        $this->table = 'usuarios';
        $this->conn = Conn::getInstance();
    }
    function getNameById($id){
        return $this->findBy('id',$id,'nome');
    }

     function getUserById($id){
        return $this->findBy('id',$id);
    }
    
    function getUserByCpf($cpf){
         return $this->findBy('cpf',$cpf);   
    }

}