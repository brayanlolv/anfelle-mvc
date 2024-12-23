<?php 

function getStatus($char){
    switch ($char){
      case "M":
        return "montagem";
      case "F": 
        return "finalizado";
      case "V":
            return "vistoria";
    }
}