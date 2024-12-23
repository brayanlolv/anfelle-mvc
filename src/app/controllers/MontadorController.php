<?php
namespace app\controllers;


use app\controllers\ContainerController; 
use app\daos\MontadorDAO; 
class MontadorController extends ContainerController{

    private $montadorDAO;
    //depois por um argumento aqui
    function __construct(){
        $this->montadorDAO = new MontadorDAO;
    }

    public function index(){
        $this->view("\montador\consultarFormularioAFL.php",null);
    }

    public function consult($afl){
        $codigo = $afl;
        //tratar o codigo
        // echo " a paramentro foi, ". $codigo;
        $data = $this->montadorDAO->findByAFL($codigo);
        //tratar para nao vazer se der ruim

        //b o ta no fetchall model
        $this->view('\montador\respostaConsultarAFL.php',$data);

    }

  

}