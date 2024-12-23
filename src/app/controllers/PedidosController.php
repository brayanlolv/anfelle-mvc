<?php
namespace app\controllers;


use app\controllers\ContainerController; // controler pai que é herdado
use app\daos\PedidoModel; //model dos pedidos
class PedidosController extends ContainerController{

    private $pedidoDAO;
    //depois por um argumento aqui
    function __construct(){
         $this->pedidoDAO = new PedidoModel;
        // parent::__construct();
         // $this->$pedidoModel = 2;
    }

    public function index(){
        echo '<br> pedidos index <br>';
        $data = $this->pedidoDAO->all();
        $this->view('\pedidos\index.php', $data);
        // echo 'idex';
    }

    //cospi o fomulario para criar um pedido
    public function create(){
        $this->view('\pedidos\criar-pedido.php',null);
    }
    //cospi form para editar
    public function edit(){
        $this->view('\pedidos\editar-pedido.php',null);
    }
    //recebe o formulario e salva no banco de dados 
    public function add(){


       try{
        filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->pedidoDAO->insert( $_POST['codigo'],$_POST['nome'],$_POST['endereco_cliente'],$_POST['cep_cliente'],$_POST['endereco_montagem'],$_POST['cep_montagem'],$_POST['telefone'],
        $_POST['valor'],$_POST['status'],$_POST['montador'],$_POST['data-inicio'],$_POST['data-fim']);
       }finally{
            $this->redirect('/pedidos');
       }
    }

    public function update(){

    }

    public function delete(){

    }

}