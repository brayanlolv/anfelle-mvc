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
    
    protected $descricao_pedido;
    protected $valor_total;
    protected $valor_promob;
    protected $descricao_pagamento;
    protected $vendedor;
    
    //arrumar isso
    protected $data_nascimento;
    public $inicio;
    public $fim;
    
    // trabalhar nisso agora
    protected $situacao;

    protected $lastModifiedBy;
    // protected $ambientes;




   

    public function __construct( $afl,$nome,$email,$cpf,$rg,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,
    $descricao_pedido,$valor_total,$valor_promob,$vendedor,$lastModifiedBy,$data_nascimento,$descricao_pagamento='',
    $status = 1, $data_inicio='',$data_fim=''){

        $this->codigo = $afl ;
        $this->nome =  $this->validateGenericAtribute($nome,'nome');
        $this->setCpf($cpf);
        $this->rg = $this->validateGenericAtribute($rg,'RG'); // depois estudar sobre configurar isso
        $this->setEmail($email);

       
        $this->endereco_cliente =  $this->validateGenericAtribute($endereco_cliente, 'endereco cliente');

        //validacao de cep
        $this->cep_cliente = $cep_cliente ;

        
        $this->endereco_montagem = $this->validateGenericAtribute($endereco_montagem,'endereco de montagem');

        //validacao de cep
        $this->cep_montagem = $cep_montagem ;

        // echo 'descricao pedido' . $desc_pedido;
        $this->telefone = $this->validateGenericAtribute($telefone,'telefone');
        $this->descricao_pedido = $this->validateGenericAtribute($descricao_pedido,'descricao do pedido');
        $this->valor_total = $this->validatePrice($valor_total);
        $this->valor_promob = $this->validatePrice($valor_promob);
        $this->vendedor = $vendedor;
        $this->lastModifiedBy = $this->validateGenericAtribute($lastModifiedBy,'ultimo a mexer');
        $this->descricao_pagamento = $descricao_pagamento;
        $this->data_nascimento =$this->validateGenericAtribute($data_nascimento,'data de nascimento');

        $this->situacao = $status;
        $this->inicio =  $data_inicio;
        $this->fim = $data_fim ;


    }

    
    public static function construcFromRow( array $row ) {
    return  new self($row['codigo'],$row['nome'],$row['email'],$row['cpf'],$row['rg'],
    $row['endereco_cliente'], $row['cep_cliente'],
    $row['endereco_montagem'],$row['cep_montagem'],$row['telefone'],
    $row['descricao_pedido'],$row['valor_total'],$row['valor_promob'],$row['vendedor'],$row['lastModifiedBy'],
    $row['data_nascimento'], $row['descricao_pagamento'],
    $row['situacao'], $row['inicio'],$row['fim'],);
    }
    
    

    public function setCpf($cpf){

        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace('-','',$cpf);
        if($this->validateCpf($cpf)){
            return $this->cpf =  $cpf;
        }

        throw new \Exception('cpf invalido');

    }
    public function setEmail($email){
        if($this->validateEmail($email)){
            return $this->email = $email;
        }
        
        throw new \Exception('email invalido');

    }

   
    
}
