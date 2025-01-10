<?php

namespace app\models;



use app\config\Conn;
class MontadorDAO{

    private $conn;
    
    function __construct(){
        $this->conn = Conn::getInstance();
    }
    
    public function findByAFL($afl){
        $sql = 'SELECT codigo, nome, telefone, endereco_montagem,cep_montagem, inicio, fim  FROM pedidos WHERE codigo = :codigo ';//talvez adicionar um limitador aqui
        //  AND situacao = "M"
        $stm =$this->conn ->prepare($sql);
        //tratar esse codigo aqui
        $stm->execute(['codigo'=>$afl]);
        //problema ta nesse fetchall
        return $stm->fetch();

    }
}