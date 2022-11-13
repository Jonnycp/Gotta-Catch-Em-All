<?php
function verificaEsistenzaParametri($array){
    $n=0;
    foreach ($array as $parametro=> $valore) { 
        $parametri=['HP','ATK','DEF','SP_ATK','SP-DEF','SPEED'];
        if(in_array(strtoupper($parametro),$parametri) ){
            $n+=1;
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
?>