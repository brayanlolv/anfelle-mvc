<?php
namespace app\daos\entities;

class Cliente extends CoreEntity {
    //protected pq precisa ser acessivel pela classe pai
    protected $nome;
    protected $email;
    protected $cpf;
    protected $rg;
    protected $endereco_cliente;
    protected $cep_cliente;
    protected $telefone;
    protected $data_nascimento;

    protected $lastModifiedBy;




   

    public function __construct( $afl,$nome,$email,$cpf,$rg,$endereco_cliente,$cep_cliente,$telefone,
    $lastModifiedBy,$data_nascimento){

        $this->nome =  $this->setGenericAtribute($nome,'nome');
        $this->setCpf($cpf);
        $this->rg = $this->setGenericAtribute($rg,'RG'); // depois estudar sobre configurar isso
        $this->setEmail($email);
        $this->endereco_cliente =  $this->setGenericAtribute($endereco_cliente, 'endereco cliente');
        $this->cep_cliente = $cep_client;
        $this->telefone = $this->setGenericAtribute($telefone,'telefone');
        $this->lastModifiedBy =  $lastModifiedBy;
        $this->data_nascimento =$this->setGenericAtribute($data_nascimento,'data de nascimento');
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
