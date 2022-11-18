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

function normalizerCSV($pokemon){
    //richiama ricercaminemax
    //array che contine pokemon normalizzato con un ciclo for
    
}

function ricercaMaxMin($pokemon){
    $colonne=["hp"=>[],"atk"=>[],"defense"=>[],"sp_atk"=>[],"sp_def"=>[],"speed"=>[]];
    for ($i=0; $i < count($pokemon); $i++) { 
        array_push($colonne["hp"],$pokemon[$i]["hp"]);
        array_push($colonne["atk"],$pokemon[$i]["atk"]);
        array_push($colonne["defense"],$pokemon[$i]["defense"]);
        array_push($colonne["sp_atk"],$pokemon[$i]["sp_atk"]);
        array_push($colonne["sp_def"],$pokemon[$i]["sp_def"]);
        array_push($colonne["speed"],$pokemon[$i]["speed"]);
    }

    $minmax=["hp"=>[],"atk"=>[],"defense"=>[],"sp_atk"=>[],"sp_def"=>[],"speed"=>[]];
    
    for ($i=0; $i < count($pokemon); $i++) {
        $minhp=min($minmax["hp"]);
        $maxhp=max($minmax["hp"]);
        $pokemon[$i][$hp]=[$minhp,$maxhp];
        
        $minatk=min($minmax["atk"]);
        $maxatk=max($minmax["atk"]);
        $pokemon[$i][$atk]=[$minatk,$maxatk];
       
        $mindefense=min($minmax["defense"]);
        $maxdefense=max($minmax["defense"]);
        $pokemon[$i][$defense]=[$mindefe3nse,$maxdefense];

        $minspatk=min($minmax["spatk"]);
        $maxspatk=max($minmax["spatk"]);
        $pokemon[$i][$spatk]=[$minspatk,$maxspatk];

        $minspdef=min($minmax["spdef"]);
        $maxspdef=max($minmax["spdef"]);
        $pokemon[$i][$spdef]=[$minspdef,$maxspdef];

        $minspeed=min($minmax["speed"]);
        $maxspeed=max($minmax["speed"]);
        $pokemon[$i][$speed]=[$minspeed,$maxspeed];
    }
    
    //array di due numeri per max e min 
    //restituire l'array di sopra
}

function normalizer($min,$max){
    //applica la formula matematica, prende in input un numero (x)
    //normalizer chiamta da normalizercsv
    
}
?>