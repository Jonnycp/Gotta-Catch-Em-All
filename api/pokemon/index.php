<?php
require("../headers.php");
require("./inputs.php");
require("./files.php");
require("./main.php");
putHeaders("GET"); 
if($_SERVER['REQUEST_METHOD']=="GET"){
    if(verificaEsistenzaParametri($_GET)){
        $valori=controlloInput($_GET);
        if(count($valori)>=2){
            $pokemons=readCSV();
            $distanzePokemon=distanzePokemon($pokemons,$valori);
            echo json_encode(estrazione(5,$pokemons,$distanzePokemon));
        }
    }
}else{
    http_response_code(405);
    echo json_encode(array("message" => "Metodo non abilitato"));
}
?>