<?php

namespace app\daos;


use app\config\Conn;
use app\daos\entities\Pedido;
class PedidoDAO{

    private $conn;


    function __construct(){
        $this->conn = Conn::getInstance();
    }
    
    public function all($offset){
        $sql = 'SELECT * FROM `pedidos` LIMIT 25 OFFSET :offseted;';//talvez adicionar um limitador aqui
        $stm =$this->conn ->prepare($sql);
        $stm->execute([':offseted'=>$offset]);
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

    public function updateById($afl,$nome,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
    $valor,$status,$montador,$data_inicio,$data_fim){

        $pedido = new Pedido( $afl,$nome,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
        $valor,$status,$montador,$data_inicio,$data_fim);

        var_dump($pedido->toDictionary());
        $stmt = $this->conn->prepare('UPDATE  pedidos SET nome = :nome , telefone = :telefone,  montador = :montador, valor =:valor ,
        inicio = :data_inicio, fim = :data_fim ,endereco_cliente = :endereco_cliente, endereco_montagem = :endereco_montagem ,cep_cliente=:cep_cliente,
         cep_montagem= :cep_montagem, situacao=:estado WHERE codigo = :codigo');
        // echo '<br> entidade = <br>'. var_dump($pedido->toDictionary());
        $stmt->execute($pedido->toDictionary());
    }   

    

   //usar o like aqui, mas sanitizar melhor para isso
    public function findAllByNome($nome){
        $sql = 'SELECT *  FROM pedidos WHERE nome LIKE :nome';
        $stm =$this->conn ->prepare($sql);
        //tratar esse nome aqui
        $stm->execute(['nome'=>'%'.$nome.'%']); // da ruim com os % no sql :()
        //problema ta nesse fetchall
        return $stm->fetchAll();
    }

    //usar o like aqui, mas sanitizar melhor para isso
    public function findAllByAFL($afl){
        $sql = 'SELECT *  FROM pedidos WHERE codigo = :codigo';
        $stm =$this->conn ->prepare($sql);
        //tratar esse codigo aqui
        $stm->execute(['codigo'=>$afl]);
        //problema ta nesse fetchall
        return $stm->fetchAll();

    }



    public function findByAFL($afl){
        $sql = 'SELECT *  FROM pedidos WHERE codigo = :codigo';
        $stm =$this->conn ->prepare($sql);
        //tratar esse codigo aqui
        $stm->execute(['codigo'=>$afl]);
        //problema ta nesse fetchall
        return $stm->fetch();

    }

    public function deleteById(){        
    }
    
}