<?php

namespace app\daos;


use app\config\Conn;
use app\daos\entities\Pedido;
class PedidoModel{

    private $conn;


    function __construct(){
        $this->conn = Conn::getInstance();
    }
    
    public function all(){
        $sql = 'SELECT * FROM `pedidos`';//talvez adicionar um limitador aqui
        $stm =$this->conn ->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }


    //talvez usar um dicionario como parametro fosse melhor
    public function insert( $afl,$nome,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
    $valor,$status,$montador,$data_inicio,$data_fim){
        $pedido = new Pedido( $afl,$nome,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
        $valor,$status,$montador,$data_inicio,$data_fim);

        //talvez deixar o prepare num escopo maior seja mais rapido
        $stmt = $this->conn->prepare('INSERT INTO pedidos (codigo,nome, telefone, montador,valor,inicio,fim,
        endereco_cliente,endereco_montagem,cep_cliente,cep_montagem, situacao)
        VALUES (:codigo, :nome,  :telefone, :montador, :valor, :data_inicio, :data_fim,:endereco_cliente,:endereco_montagem,:cep_cliente,:cep_montagem, :estado )');
        // echo '<br> entidade = <br>'. var_dump($pedido->toDictionary());
        $stmt->execute($pedido->toDictionary());
        
    }

    public function deleteById(){        
    }
    
}