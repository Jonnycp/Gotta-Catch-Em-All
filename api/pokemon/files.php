<?php
$csvname='pokemons.csv';
function readCSV($csvname){
    $handle = fopen($csvname, “r”); 
    $lineNumber = 1;
        while (($raw_string = fgets($handle)) !== false) {
            $row = str_getcsv($raw_string);
            var_dump($row);
            $lineNumber++;
            $row=(int)$row;
            $array=array("id"=>[],"nome"=>[],"tipo"=>[],"HP"=>[],"ATTACK"=>[],"DEFENSE"=>[],"SP_ATK"=>[],"SP_DEF"=>[],"SPEED"=>[]"TOTAL"=>[],"GENERAZIONE"=>[],"isLegendary"=>[]);
        }
        fclose($handle);

    return $array;
}
?>