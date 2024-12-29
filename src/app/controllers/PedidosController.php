<?php
namespace app\controllers;


use app\controllers\ContainerController; // controler pai que é herdado
use app\daos\PedidoDAO; //model dos pedidos
class PedidosController extends ContainerController{

    private $pedidoDAO;
 
    function __construct(){
         $this->pedidoDAO = new PedidoDAO;
    }

    public function index(){
        if(!$this->isLogged()){return $this->redirect('\\'); }
        echo '<br> pedidos index <br>';
        $data = $this->pedidoDAO->all();
        $this->view('\pedidos\index.php', $data);
        // echo 'idex';
    }


    //musar esse index, por favor,
    //para uma view list
    public function searchByAfl($afl){
        if(!$this->isLogged()){return $this->redirect('\\'); }
        echo '<br> pedidos index <br>';
        $data = $this->pedidoDAO->findAllByAFL($afl);
        $this->view('\pedidos\index.php', $data);
    }
    
    public function searchByNome($nome){
        if(!$this->isLogged()){return $this->redirect('\\'); }
        echo '<br> pedidos index <br>';
        $data = $this->pedidoDAO->findAllByNome($nome);
        $this->view('\pedidos\index.php', $data);
    }

    //cospi o fomulario para criar um pedido
    public function create(){
        if(!$this->isLogged()){return $this->redirect('\\'); }
        $this->view('\pedidos\criar-pedido.php',null);
    } 
    //cospi form para editar
    public function edit($afl){
        if(!$this->isLogged()){return $this->redirect('\\'); }

        //deveria tratar essa afl antes
        
            $pedido = $this->pedidoDAO->findByAfl($afl);
            if(!$pedido){
                return 'bad request, pedido nao existente';
            }
            $this->view('\pedidos\editar-pedido.php',$pedido);

    }
    //recebe o formulario e salva no banco de dados 
    public function add(){
        if(!$this->isLogged()){return $this->redirect('\\'); }
        

       try{
        filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW );
        $this->pedidoDAO->insert( $_POST['codigo'],$_POST['nome'],$_POST['endereco_cliente'],$_POST['cep_cliente'],$_POST['endereco_montagem'],$_POST['cep_montagem'],$_POST['telefone'],
        $_POST['valor'],$_POST['status'],$_POST['montador'],$_POST['data-inicio'],$_POST['data-fim']);
       }finally{
            $this->redirect('/pedidos');
       }
    }

    public function update($afl){
        if(!$this->isLogged()){return $this->redirect('\\'); }
        $codigo = $afl; //tratar isso
        echo 'essa é a afl'.$afl ;
       try{
        filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW );
        $this->pedidoDAO->updateById( $codigo ,$_POST['nome'],$_POST['endereco_cliente'],$_POST['cep_cliente'],$_POST['endereco_montagem'],$_POST['cep_montagem'],$_POST['telefone'],
        $_POST['valor'],$_POST['status'],$_POST['montador'],$_POST['data-inicio'],$_POST['data-fim']);
       }finally{
           $this->redirect('/pedidos');
       }

    }

    public function delete(){

    }

}