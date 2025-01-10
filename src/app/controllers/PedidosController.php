<?php
namespace app\controllers;


use app\controllers\ContainerController; // controler pai que é herdado
use app\models\PedidoDAO; //model dos pedidos
use app\models\UserDAO; 
class PedidosController extends ContainerController{

    private $pedidoDAO;
 
    function __construct(){
         $this->pedidoDAO = new PedidoDAO;
    }

    public function index(){
        $this->redirect('\\pedidos\lista\1');
    }


    //refatorar e sar o join
    public function details($afl){
        $userDAO =  new UserDAO;
        if(!$this->isLogged() == 2){return $this->redirect('\\'); }
        $pedido = $this->pedidoDAO->findByAfl($afl);
        $vendedor = $userDAO->getNameById($pedido['vendedor']);
        var_dump($pedido);
        var_dump($vendedor);
        $pedido['vendedor'] = $vendedor[0];
        $this->view('\pedidos\details.php', $pedido);
      }

    public function list($offset)
    {   
        if(!$this->isLogged() > 0){return $this->redirect('\\'); }
        $pageNumber = $this->validatePagination($offset);
        $data = $this->pedidoDAO->all($pageNumber);
        $this->view('\pedidos\lista.php',array(
            'query'=>$data,
            'pagNumber' => $pageNumber
        ));
    }

    public function search(){
        if(!$this->isLogged() > 0){return $this->redirect('\\'); }
        $data = NULL;

        if(isset($_GET['afl'])){
            $data = $this->pedidoDAO->findAllByAFL(filter_var($_GET['afl'],FILTER_UNSAFE_RAW));
        }else if(isset($_GET['nome'])){
            $data = $this->pedidoDAO->findAllByNome(filter_var($_GET['nome'],FILTER_UNSAFE_RAW));
        }
        $this->view('\pedidos\lista.php', array(
            'query'=>$data,
            'pagNumber' => 1
        ));
    }
    

   


    //cospi o fomulario para criar um pedido
    public function create(){
        if(!$this->isLogged() > 0){return $this->redirect('\\'); }
        $this->view('\pedidos\criar-pedido.php',null);
    } 
    //cospi form para editar
    public function edit($afl){
        if(!$this->isLogged() == 2){return $this->redirect('\\'); }

        //deveria tratar essa afl antes
        
            $pedido = $this->pedidoDAO->findByAfl($afl);
            if(!$pedido){
                return 'bad request, pedido nao existente';
            }
            $this->view('\pedidos\editar-pedido.php',$pedido);

    }
    //recebe o formulario e salva no banco de dados 
    public function add(){
        if(!$this->isLogged() > 0){return $this->redirect('\\'); }
        
        //refatorar toda essa merda
       try{
        echo $_POST['data_nascimento'];
        //ver se é necessarop trocar ponto por virgula
        $valor_total = $_POST['valor_total'];
        $valor_promob = $_POST['valor_promob'];
        $vendedor = $_SESSION['user_id'];
        filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
        
        $this->pedidoDAO->insert( $_POST['codigo'],$_POST['nome'],
        filter_var($_POST['email'],FILTER_SANITIZE_EMAIL),
        $_POST['cpf'],$_POST['rg'],$_POST['endereco_cliente'],$_POST['cep_cliente'],$_POST['endereco_montagem'],$_POST['cep_montagem'],$_POST['telefone'],
        $_POST['desc_pedido'],
        filter_var($valor_total,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION),
        filter_var($valor_promob,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION),
        $vendedor,$vendedor,$_POST['data_nascimento'],
        $_POST['desc_pagamento'], 1);

        // $this->redirect('/pedidos');
       }catch(\Exception  $e){
            echo  $e->getMessage().' deu ruim';
        }
    
    }

    public function update($afl){
        if(!$this->isLogged() == 2){return $this->redirect('\\'); }
        $codigo = filter_var($afl,FILTER_UNSAFE_RAW); //tratar isso

       try{
        filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW );

        $this->pedidoDAO->updateById( $codigo,$_POST['nome'],
        filter_var($_POST['email'],FILTER_SANITIZE_EMAIL),
        $_POST['cpf'],$_POST['rg'],$_POST['endereco_cliente'],$_POST['cep_cliente'],$_POST['endereco_montagem'],$_POST['cep_montagem'],$_POST['telefone'],
        $_POST['desc_pedido'],
        filter_var($_POST['valor_total'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION),
        filter_var($_POST['valor_promob'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION),
        ' ',$_SESSION['user_id'],
        $_POST['desc_pagamento'],$_POST['status'],$_POST['data_inicio'],$_POST['data_fim']);

        // $this->redirect('/pedidos');
       }catch(\Exception  $e){
        echo  $e->getMessage().' deu ruim';
    }

    }

    

    public function delete(){

    }

}