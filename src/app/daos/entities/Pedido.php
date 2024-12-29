<?php
namespace app\daos\entities;
include_once dirname(__FILE__).'\CoreEntity.php';
// use CoreEntity;
class Pedido extends CoreEntity {
    //protected pq precisa ser acessivel pela classe pai
    protected $codigo;
    protected $nome;
    protected $endereco_cliente;
    protected $cep_cliente;
    protected $endereco_montagem;
    protected $cep_montagem;
    protected $telefone;
    protected $valor;
    protected $estado;
    protected $montador;
    protected $data_inicio;
    protected $data_fim;
    
    public function __construct( $afl,$nome,$endereco_cliente,$cep_cliente,$endereco_montagem,$cep_montagem,$telefone,$valor,
    $status,$montador,$data_inicio,$data_fim){
        
        //por setters and getters para fazer validacao, recusando com throw
    
        // $this->id = $id ;
        $this->codigo = $afl ;
        // $this->setCpf('43423');
        $this->nome = $nome ;
        $this->endereco_cliente = $endereco_cliente ;
        $this->cep_cliente = $cep_cliente ;
        $this->endereco_montagem = $endereco_montagem ;
        $this->cep_montagem = $cep_montagem ;
        $this->telefone = $telefone ;
        $this->valor = $valor;  
        $this->estado = $status ;
        $this->montador = $montador ;
        $this->data_inicio =  $data_inicio;
        $this->data_fim = $data_fim ;


    }


    function setCpf($cpf){

        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace('-','',$cpf);
        if($this->validateCpf($cpf)){
            return $this->$cpf = $cpf;
        }

        throw new \Execption('cpf invalido');

    }

   
    
}
