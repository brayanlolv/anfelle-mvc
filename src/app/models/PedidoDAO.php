<?php
namespace app\models;

use app\config\Conn;
use app\models\entities\Pedido;
class PedidoDAO extends Model{

    protected $conn;

    function __construct(){
        $this->conn = Conn::getInstance();
        $this->table = 'pedidos';
    }
    
    public function all($offset){
        return $this->findAll($offset);
    }

    public function insert($pedidoEntity){
        $pedDict =  $pedidoEntity->toDictionary(); //gambiarra
        try{$this->save($pedidoEntity);}
        catch(\Exception $e){throw new \Exception("problemas na requisicao");}
    }
    
    public function updateById($pedidoEntity){
            $this->update($pedidoEntity->toDictionary(),'codigo',['email','telefone','descricao_pedido','valor_total','valor_promob',
            'descricao_pagamento','endereco_cliente','endereco_montagem','cep_cliente',
            'cep_montagem','lastModifiedBy','inicio','fim','situacao']);
    }   

    public function findByAFL($afl){
        return $this->findBy('codigo',$afl);
    }
    
   //usar o like aqui, mas sanitizar melhor para isso
    public function findAllByNome($nome){
        $sql = 'SELECT *  FROM pedidos WHERE nome LIKE :nome';
        $stm =$this->conn ->prepare($sql);
        $stm->execute(['nome'=>'%'.$nome.'%']); // da ruim com os % no sql :()
        return $stm->fetchAll();
    }

    public function deleteById(){        
    }
    
}