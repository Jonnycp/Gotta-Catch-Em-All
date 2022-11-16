<?php
function readCSV(){
    //$file='../../data/pokemons.csv';
    $file = fopen('../../data/pokemons.csv', "r"); 
    $lineNumber = 0;
    $array=[];
    while(!feof($file)) {
        $stringa = fgets($file);
        if($lineNumber>0){
            $row = str_getcsv($stringa);//prende la stringa e la suddivide in un array
            $pokemon=array("id"=>(int)$row[0],"nome"=>$row[1],"tipo"=>[$row[2],$row[3]],"hp"=>(int)$row[5],"attack"=>(int)$row[6],"defense"=>(int)$row[7],"sp_atk"=>(int)$row[8],"sp_def"=>(int)$row[9],"speed"=>(int)$row[10],"total"=>(int)$row[4],"generazione"=>(int)$row[11],"isLegendary"=>boolval($row[12]));
            array_push($array,$pokemon);

        }
        $lineNumber++;
        
    }
    fclose($file);
   

    return $array;
}

?>