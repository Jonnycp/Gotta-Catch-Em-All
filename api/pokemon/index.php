<?php
require("../headers.php");
require("./inputs.php");
putHeaders("GET"); 
if($_SERVER['REQUEST_METHOD']=="GET"){
    if(verificaEsistenzaParametri($_GET)){
        //prossime cose.... soon
        $valori=controlloInput($_GET);
    }
}else{
    http_response_code(405);//metodo non permesso
    echo json_encode(array("message" => "Metodo non abilitato"));
}
?>