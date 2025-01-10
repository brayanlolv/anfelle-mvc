<?php

enum Teste: int {
    case CHOICE_ONE = 1;
    case CHOICE_TWO = 2;
}


     echo Teste::CHOICE_TWO->value;

     if(0 < Teste::CHOICE_TWO->value){
        echo 'foi';
     }