<?php
namespace app\models;

use app\config\Conn;
use app\models\entities\Pedido;
class PedidoDAO{

    private $conn;


    function __construct(){
        $this->conn = Conn::getInstance();
    }
    
    public function all($offset){
        
        $sql = 'SELECT * FROM pedidos ORDER BY id DESC LIMIT 25 OFFSET '.($offset * 25 - 25) . ' ;';//talvez adicionar um limitador aqui
        $stm =$this->conn ->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }


    //talvez usar um dicionario como parametro fosse melhor

    
    public function insert( $afl,$nome,$email,$cpf,$rg,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
    $desc_pedido,$valor_total,$valor_promob,$vendedor,$lastModifiedBy,$data_nascimento,$desc_pagamento,$situacao){
        $pedido = new Pedido( $afl,$nome,$email,$cpf,$rg,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
        $desc_pedido,$valor_total,$valor_promob,$vendedor,$lastModifiedBy,$data_nascimento,$desc_pagamento,$situacao);

        $stmt = $this->conn->prepare('INSERT INTO pedidos
                (codigo,  nome,  email, cpf, rg, telefone, descricao_pedido, valor_total, valor_promob, descricao_pagamento,
                endereco_cliente, cep_cliente, endereco_montagem, cep_montagem, vendedor, lastModifiedBy,data_nascimento)
        VALUES  (:codigo, :nome, :email, :cpf, :rg, :telefone, :desc_pedido, :valor_total, :valor_promob, :desc_pagamento,
                :endereco_cliente, :cep_cliente, :endereco_montagem, :cep_montagem , :vendedor, :lastModifiedBy, :data_nascimento)');
        
        // situacao = :situacao
        var_dump($pedido->toDictionary());
        $pedDict =  $pedido->toDictionary(); //gambiarra
        $stmt->execute([
            'codigo'=>$pedDict['codigo'],
            'nome' =>$pedDict['nome'],
            'email' =>$pedDict['email'],
            'cpf' =>$pedDict['cpf'],
            'rg' =>$pedDict['rg'],
            'telefone' =>$pedDict['telefone'],
            'desc_pedido'=> $pedDict['desc_pedido'],
            'valor_total'=> $pedDict['valor_total'],
            'valor_promob'=> $pedDict['valor_promob'],
            'desc_pagamento'=> $pedDict['desc_pagamento'],
            'endereco_cliente' =>$pedDict['endereco_cliente'],
            'endereco_montagem' =>$pedDict['endereco_montagem'],
            'cep_cliente' =>$pedDict['cep_cliente'],
            'cep_montagem' =>$pedDict['cep_montagem'],
            'vendedor' =>$pedDict['vendedor'],
            'lastModifiedBy' => $pedDict['lastModifiedBy'],
            'data_nascimento' => $pedDict['data_nascimento'],
            // 'situacao' => $pedDict['estado'],
        ]);
        // throw new \Exception("testand");
    }

    public function updateById( $afl,$nome,$email,$cpf,$rg,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
    $desc_pedido,$valor_total,$valor_promob,$vendedor,$lastModifiedBy,$desc_pagamento,$situacao,$data_inicio,$data_fim){

        $pedido = new Pedido(  $afl,$nome,$email,$cpf,$rg,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
        $desc_pedido,$valor_total,$valor_promob,$vendedor,$lastModifiedBy,'$data_nascimento',$desc_pagamento,$situacao,$data_inicio,$data_fim);
        var_dump($pedido->toDictionary());
        $stmt = $this->conn->prepare('UPDATE  pedidos SET email = :email, telefone = :telefone, 
        descricao_pedido = :desc_pedido, valor_total = :valor_total, valor_promob = :valor_promob, 
        descricao_pagamento = :desc_pagamento, endereco_cliente = :endereco_cliente, endereco_montagem = :endereco_montagem,
        cep_cliente = :cep_cliente, cep_montagem = :cep_montagem, lastModifiedBy = :lastModifiedBy,
        inicio = :data_inicio, fim = :data_fim, situacao = :situacao WHERE codigo = :codigo');
        $pedDict =  $pedido->toDictionary();
        $stmt->execute([
            'codigo'=>$afl,
            'email' =>$pedDict['email'],
            'telefone' =>$pedDict['telefone'],
            'desc_pedido'=> $pedDict['desc_pedido'],
            'valor_total'=> $pedDict['valor_total'],
            'valor_promob'=> $pedDict['valor_promob'],
            'desc_pagamento'=> $pedDict['desc_pagamento'],
            'endereco_cliente' =>$pedDict['endereco_cliente'],
            'endereco_montagem' =>$pedDict['endereco_montagem'],
            'cep_cliente' =>$pedDict['cep_cliente'],
            'cep_montagem' =>$pedDict['cep_montagem'],
            'lastModifiedBy' => $pedDict['lastModifiedBy'],
            'data_inicio' => $pedDict['data_inicio'],
            'data_fim' => $pedDict['data_fim'],
            'situacao' => $pedDict['estado'],
        ]);
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