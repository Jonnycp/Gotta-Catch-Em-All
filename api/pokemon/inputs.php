<?php
function verificaEsistenzaParametri($array){
    $n=0;
    foreach ($array as $parametro=> $valore) { 
        $parametri=['HP','ATK','DEF','SP_ATK','SP_DEF','SPEED'];
        if(in_array(strtoupper($parametro),$parametri) ){
            $n+=1;
            $indexParametro=array_search(strtoupper($parametro),$parametri);
            unset($parametri[$indexParametro]);
        }else{
            http_response_code(400);
            echo json_encode(array("message" => "Parametro non valido"));
            return false;
        }
    }

if($n<2){
    http_response_code(400);
    echo json_encode(array("message" => "Parametri non sufficienti"));
    return false;
}else{
    return true;
}
}

function controlloInput($array){
    $inputs=[];
    $maxmin=array("HP"=>[0, 300],"ATK"=>[0, 300],"DEF"=>[0, 300],"SP_ATK"=>[0, 300],"SP_DEF"=>[0, 300],"SPEED"=>[0, 300]);
    foreach ($array as $parametro=> $valore) { 
        $valore = trim($valore); 
        $valore = stripslashes($valore); 
        $valore = htmlspecialchars($valore); 
        $valore = str_replace(' ', '', $valore); 
        if(is_numeric($valore)){
            $valore=(int)$valore;
            $min = $maxmin[strtoupper($parametro)][0];
            $max = $maxmin[strtoupper($parametro)][1];
            if($valore>= $min && $valore <= $max){
                $inputs[strtolower($parametro)]=$valore; 
            }else{
                http_response_code(422);
                echo json_encode(array("message" => "$parametro deve essere compreso tra $min e $max"));
                return [];   
            }
        }else{
            http_response_code(422);
            echo json_encode(array("message" => "$parametro non ha un valore valido"));
            return [];   
        }
    }
    return $inputs;
}
?>