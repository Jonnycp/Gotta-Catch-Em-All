<?php
function readCSV(){
    //$file='../../data/pokemons.csv';
    $file = fopen('data/pokemons.csv', “r”); 
    $lineNumber = 1;
    $array=[];
    while(!feof($file)) {
        $stringa = fgets($file);
        $row = str_getcsv($stringa);//prende la stringa e la suddivide in un array
        print_r($row);
    }
    fclose($file);
    //$array=array("id"=>[$row],"nome"=>[],"tipo"=>[],"HP"=>[],"ATTACK"=>[],"DEFENSE"=>[],"SP_ATK"=>[],"SP_DEF"=>[],"SPEED"=>[]"TOTAL"=>[],"GENERAZIONE"=>[],"isLegendary"=>[]);

    return $array;
}

readCSV();
?>