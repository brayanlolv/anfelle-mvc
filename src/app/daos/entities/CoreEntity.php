<?php

namespace app\daos\entities;

class CoreEntity{

    public function toDictionary(){
        $result = [];
        foreach ($this as $key => $value) {
           $result[$key] = $value;
        }
        return $result;
    }

    protected function validateCpf($cpf){//retorna true se valido, valida por digito

   
        $cpfVector = str_split($cpf);
      
        $digitoesperado = array();
      
        $somatoria = 0;
        for( $i = 8;$i > -1;$i-- ){
          $somatoria += $cpfVector[$i] * (10 - $i);
          echo $cpfVector[$i];
        }
        //obtendo a dezna do digito
        if($somatoria % 11 == 0 ||$somatoria % 11 == 1){
          $digitoesperado[0] = 0;
        }else{
          $digitoesperado[0] = 11 - ($somatoria % 11); 
        }
      
        
        $somatoria = $digitoesperado[0] * 2;
      
        for( $i = 8;$i > -1;$i-- ){
          $somatoria += $cpfVector[$i] * (11 - $i);
        }
      
        if($somatoria % 11 == 0 ||$somatoria % 11 == 1){
          $digitoesperado[1] = 0;
        }else{
          $digitoesperado[1] = 11 - ($somatoria % 11); 
        }
      
        if((int) $cpfVector[9] == $digitoesperado[0] && (int) $cpfVector[10] == $digitoesperado[1] ){
          return true;
        }
      
        return false;
        // return $digitoesperado;
      }



}