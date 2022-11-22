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
    $minmax=ricercaMinMax($pokemon);
    for ($i=0; $i < count($pokemon); $i++) { 
    $pokemon[$i]["hp"]=normalizer($pokemon[$i]["hp"],$minmax["hp"][0],$minmax["hp"][1]);
    $pokemon[$i]["atk"]=normalizer($pokemon[$i]["atk"],$minmax["atk"][0],$minmax["atk"][1]);
    $pokemon[$i]["defense"]=normalizer($pokemon[$i]["defense"],$minmax["defense"][0],$minmax["defense"][1]);
    $pokemon[$i]["sp_attack"]=normalizer($pokemon[$i]["sp_attack"],$minmax["sp_attack"][0],$minmax["sp_attack"][1]);
    $pokemon[$i]["sp_def"]=normalizer($pokemon[$i]["sp_def"],$minmax["sp_def"][0],$minmax["sp_def"][1]);
    $pokemon[$i]["speed"]=normalizer($pokemon[$i]["speed"],$minmax["speed"][0],$minmax["speed"][1]);
    }
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
        $pokemon[$i]["hp"]=[$minhp,$maxhp];
        
        $minatk=min($minmax["atk"]);
        $maxatk=max($minmax["atk"]);
        $pokemon[$i]["atk"]=[$minatk,$maxatk];
       
        $mindefense=min($minmax["defense"]);
        $maxdefense=max($minmax["defense"]);
        $pokemon[$i]["defense"]=[$mindefe3nse,$maxdefense];

        $minspatk=min($minmax["spatk"]);
        $maxspatk=max($minmax["spatk"]);
        $pokemon[$i]["spatk"]=[$minspatk,$maxspatk];

        $minspdef=min($minmax["spdef"]);
        $maxspdef=max($minmax["spdef"]);
        $pokemon[$i]["spdef"]=[$minspdef,$maxspdef];

        $minspeed=min($minmax["speed"]);
        $maxspeed=max($minmax["speed"]);
        $pokemon[$i]["speed"]=[$minspeed,$maxspeed];
    }
    
    return $minmax;
}

function normalizer($min,$max,$numero){
    $numero=[$numero-[min($numero)]]/[max($numero)-min($numero)];
    //applica la formula matematica, prende in input un numero (x)
    //normalizer chiamta da normalizercsv
    
}
?>