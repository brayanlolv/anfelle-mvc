<?php 
namespace app\models;

class Model{
    protected $table;
    
    // protected function findAllBy($id,$offset,$column = '*'){
    //     $sql = 'SELECT '.$column.'FROM'.$this->table.'ORDER BY id DESC LIMIT 25 OFFSET '.($offset * 25 - 25) . ' ;';

    //     return $sql;
    // }

    protected function  findAllBy($by,$offset, $whereParams, $column = '*'){ //esperar um array
        $sql = 'SELECT '.$column.' FROM '.$this->table.'ORDER BY id DESC LIMIT 25 OFFSET' ;
        '.($offset * 25 - 25) . ' ;
        return $sql;
    }

    protected function add(){

    }

    protected function update(){
        
    }

    private function getWhere($whereDict){
        $where = 'WHERE ';
        foreach(array_keys($whereDict) as $key){
            $where .= $key.' = :'.$key;
        }


    }
} 