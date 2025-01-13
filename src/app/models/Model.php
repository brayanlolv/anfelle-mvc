<?php 
namespace app\models;

class Model{
    protected $table;

    protected function save($entity){
        $entity = $entity->toDictionary();
        $columns = array_keys($entity);
        $sql = 'INSERT INTO '. $this->table .' ( '. implode(', ',$columns) . ' ) '.
        'VALUES ( :'. implode(', :',$columns) .' )'; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($entity);
     }

    protected function  findAll($offset, $column = '*'){ //esperar um array
        $sql = 'SELECT '. $column.' FROM '.$this->table.' ORDER BY id DESC LIMIT 25 OFFSET  '.($offset * 25 - 25);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //where ['coluna' => 'valor']
    protected function  findBy($by,$value,$columns = '*'){ //esperar um array
        $sql = 'SELECT '. $columns.' FROM '.$this->table. " WHERE $by = :by";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['by'=>$value]);
        return $stmt->fetch();
    }


    //construir o objeto padrao no controller,
    //passar o o dicionario  da "$entity"
    //update um array com as colunas a serem atualizadas
    protected function update($entity,$where,$columns){//both  
        $sql = 'UPDATE '.$this->table.' SET  ';
        $dictParam = [];
        $sql .= " {$columns[0]} = :{$columns[0]} ";
        $dictParam[$columns[0]] = $entity[$columns[0]];
        for($i = 1; $i < count($columns);$i++){
            $sql .= " ,{$columns[$i]} = :{$columns[$i]} ";
            $dictParam[$columns[$i]] = $entity[$columns[$i]];
        }
        $sql .=  " WHERE $where = :by ;";  
        $dictParam['by'] = $entity[$where];
        var_dump($sql);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($dictParam);
    }   
    


    // protected function  findAllBy($by,$offset, $whereParams, $column = '*'){ //esperar um array
    //     $sql = 'SELECT '.$column.' FROM '.$this->table.'ORDER BY id DESC LIMIT 25 OFFSET' ;
    //     '.($offset * 25 - 25) . ' ;
    //     return $sql;
    // }


    

    private function getWhere($whereDict){
        $where = 'WHERE ';
        foreach(array_keys($whereDict) as $key){
            $where .= $key.' = :'.$key;
        }


    }
} 