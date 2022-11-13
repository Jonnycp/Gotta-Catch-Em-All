<?php
function verificaEsistenzaParametri($array){
    $n=0;
    foreach ($array as $parametro=> $valore) { 
        $parametri=['HP','ATK','DEF','SP_ATK','SP_DEF','SPEED'];
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

function controlloInput($array){
    $inputs=[];
    //array associativo max e min 
    $maxmin=array("HP"=>[0, 300],"ATK"=>[0, 300],"DEF"=>[0, 300],"SP_ATK"=>[0, 300],"SP_DEF"=>[0, 300],"SPEED"=>[0, 300]);
    
    foreach ($array as $parametro=> $valore) { 
        $valore = trim($valore); //Toglie gli spazi aggiuntivi davanti e dietro
        $valore = stripslashes($valore); //Toglie tutti i caratteri esadecimali
        $valore = htmlspecialchars($valore); //Toglie i caratteri html speciali
        $valore = str_replace(' ', '', $valore); //Toglie tutti gli spazi
        if(is_numeric($valore)){
            $valore=(int)$valore;
            $min = $maxmin[strtoupper($parametro)][0];
            $max = $maxmin[strtoupper($parametro)][1];
            if($valore>= $min && $valore <= $max){
                $inputs[$parametro]=$valore;  //se esiste la chiave parametro la sostituisco con valore senno te la crea
            }else{
                http_response_code(422);
                echo json_encode(array("message" => "$parametro deve essere compreso tra $min e $max"));   
            }
                //se valore è compreso tra max e min con un else con messaggio di errore 
        }else{
            http_response_code(422);
    echo json_encode(array("message" => "$parametro non ha un valore valido"));
        }
        //

    }
    return $inputs;
}
?>