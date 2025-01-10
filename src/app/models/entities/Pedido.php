<?php
namespace app\models\entities;

class Pedido extends CoreEntity {
    //protected pq precisa ser acessivel pela classe pai
    protected $codigo;
    protected $nome;
    protected $email;
    protected $cpf;
    protected $rg;
    protected $endereco_cliente;
    protected $cep_cliente;
    protected $endereco_montagem;
    protected $cep_montagem;
    protected $telefone;
    
    protected $desc_pedido;
    protected $valor_total;
    protected $valor_promob;
    protected $desc_pagamento;
    protected $vendedor;
    
    //arrumar isso
    protected $data_nascimento;
    protected $data_inicio;
    protected $data_fim;
    
    // trabalhar nisso agora
    protected $estado;

    protected $lastModifiedBy;
    protected $ambientes;




   

    public function __construct( $afl,$nome,$email,$cpf,$rg,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
    $desc_pedido,$valor_total,$valor_promob,$vendedor,$lastModifiedBy,$data_nascimento,$desc_pagamento='',
    $status = 1, $data_inicio='',$data_fim=''){

        $this->codigo = $afl ;
        $this->nome =  $this->setGenericAtribute($nome,'nome');
        $this->setCpf($cpf);
        $this->rg = $this->setGenericAtribute($rg,'RG'); // depois estudar sobre configurar isso
        $this->setEmail($email);

       
        $this->endereco_cliente =  $this->setGenericAtribute($endereco_cliente, 'endereco cliente');

        //validacao de cep
        $this->cep_cliente = $cep_cliente ;

        
        $this->endereco_montagem = $this->setGenericAtribute($endereco_montagem,'endereco de montagem');

        //validacao de cep
        $this->cep_montagem = $cep_montagem ;

        // echo 'descricao pedido' . $desc_pedido;
        $this->telefone = $this->setGenericAtribute($telefone,'telefone');
        $this->desc_pedido = $this->setGenericAtribute($desc_pedido,'descricao do pedido');
        $this->valor_total = $this->validatePrice($valor_total);
        $this->valor_promob = $this->validatePrice($valor_promob);
        $this->vendedor = $vendedor;
        $this->lastModifiedBy = $this->setGenericAtribute($lastModifiedBy,'ultimo a mexer');
        $this->desc_pagamento = $desc_pagamento;
        $this->data_nascimento =$this->setGenericAtribute($data_nascimento,'data de nascimento');

        $this->estado = $status;
        $this->data_inicio =  $data_inicio;
        $this->data_fim = $data_fim ;


    }

    

    function setCpf($cpf){

        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace('-','',$cpf);
        if($this->validateCpf($cpf)){
            return $this->cpf =  $cpf;
        }

        throw new \Exception('cpf invalido');

    }
    private function setEmail($email){
        if($this->validateEmail($email)){
            return $this->email = $email;
        }
        
        throw new \Exception('email invalido');

    }

   
    
}
