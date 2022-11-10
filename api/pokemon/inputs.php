<?php
$array=$_GET;
function verificaEsistenzaParametri($array){
    //pensavo di fare un for e con una variabile di incremento se ci fossero stati almeno due valori trasformavo la variabile booleana in true 
    if(isset()){
        $bool=true;
    }else{
        $bool=false;
    }

}
if($bool==true){
verificaEsistenzaParametri();
}else{
    http_response_code(405);//metodo non permesso
    echo json_encode(array("message" => "Metodo non abilitato"));
}
?>