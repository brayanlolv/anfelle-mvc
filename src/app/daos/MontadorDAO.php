<?php

namespace app\daos;



use app\config\Conn;
class MontadorDAO{

    private $conn;
    
    function __construct(){
        $this->conn = Conn::getInstance();
    }
    
    public function findByAFL($afl){
        $sql = 'SELECT codigo, nome, telefone, endereco_montagem,cep_montagem, inicio, fim  FROM pedidos WHERE codigo = :codigo AND situacao = "M"';//talvez adicionar um limitador aqui
        $stm =$this->conn ->prepare($sql);
        //tratar esse codigo aqui
        $stm->execute(['codigo'=>$afl]);
        //problema ta nesse fetchall
        return $stm->fetch();

    }
}