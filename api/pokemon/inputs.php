<?php
function verificaEsistenzaParametri($array){
    $n=0;
    foreach ($array as $parametro) { 
        $parametri=['HP','ATK','DEF','SP_ATK','SP-DEF','SPEED'];
        if(in_array($parametro,$parametri) ){
            $n+=1;
        }
    }

if(n<2){
    http_response_code(422);//Unprocessable Entity
    echo json_encode(array("message" => "Unprocessable Entity"));
    return false;
}else{
    return true;
}
}
?>