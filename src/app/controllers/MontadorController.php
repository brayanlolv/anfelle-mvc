<?php
namespace app\controllers;


use app\controllers\ContainerController; 
use app\models\MontadorDAO; 
class MontadorController extends ContainerController{

    private $montadorDAO;
    //depois por um argumento aqui
    function __construct(){
        $this->montadorDAO = new MontadorDAO;
    }

    public function index(){
        $this->view("\montador\consultarFormularioAFL.php",null);
    }

    public function consult(){
        $codigo = filter_var($_GET['codigo'],FILTER_UNSAFE_RAW);
        $data = $this->montadorDAO->findByAFL($codigo);
        //tratar para nao vazer se der rui
        //b o ta no fetchall model
        if($data) return $this->view('\montador\respostaConsultarAFL.php',$data);

        $this->redirect('\montador');
    }

  

}