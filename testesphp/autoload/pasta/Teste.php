<?php

namespace pasta;

class Teste{

    private $menssagem;

    public function __construct($msg){
        $this->menssagem = $msg;

    }

    public function oi(){
        echo $this->menssagem;
    }


}