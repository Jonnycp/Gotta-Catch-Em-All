<?php
function readCSV(){
    $file = fopen('../../data/pokemons.csv', "r"); 
    $lineNumber = 0;
    $array=[];
    while(!feof($file)) {
        $stringa = fgets($file);
        if($lineNumber>0){
            $row = str_getcsv($stringa);
            if(isset($row[0])){
                $pokemon=array("id"=>(int)$row[0],"nome"=>$row[1],"tipo"=>[$row[2],$row[3]],"hp"=>(int)$row[5],"atk"=>(int)$row[6],"def"=>(int)$row[7],"sp_atk"=>(int)$row[8],"sp_def"=>(int)$row[9],"speed"=>(int)$row[10],"generazione"=>(int)$row[11],"isLegendary"=>boolval($row[12])); $pokemon=array("id"=>(int)$row[0],"nome"=>$row[1],"tipo"=>[$row[2],$row[3]],"hp"=>(int)$row[5],"atk"=>(int)$row[6],"def"=>(int)$row[7],"sp_atk"=>(int)$row[8],"sp_def"=>(int)$row[9],"speed"=>(int)$row[10],"generazione"=>(int)$row[11],"isLegendary"=>boolval($row[12])); 
                 if($row[3]!=""){
                    array_push($pokemon["tipo"],$row[3]);
                }
            array_push($array,$pokemon);
            }    
        }
        $lineNumber++;
    }
    fclose($file);
    return $array;
}


function ricercaMaxMin($pokemon){
    $colonne=["hp"=>[],"atk"=>[],"def"=>[],"sp_atk"=>[],"sp_def"=>[],"speed"=>[]];
    for ($i=0; $i < count($pokemon); $i++) { 
        array_push($colonne["hp"],$pokemon[$i]["hp"]);
        array_push($colonne["atk"],$pokemon[$i]["atk"]);
        array_push($colonne["def"],$pokemon[$i]["def"]);
        array_push($colonne["sp_atk"],$pokemon[$i]["sp_atk"]);
        array_push($colonne["sp_def"],$pokemon[$i]["sp_def"]);
        array_push($colonne["speed"],$pokemon[$i]["speed"]);
    }

    $minmax=["hp"=>[],"atk"=>[],"def"=>[],"sp_atk"=>[],"sp_def"=>[],"speed"=>[]];
    
    for ($i=0; $i < count($pokemon); $i++) {
        $minhp=min($colonne["hp"]);
        $maxhp=max($colonne["hp"]);
        $minmax["hp"]=[$minhp,$maxhp];
        
        $minatk=min($colonne["atk"]);
        $maxatk=max($colonne["atk"]);
        $minmax["atk"]=[$minatk,$maxatk];
       
        $mindef=min($colonne["def"]);
        $maxdef=max($colonne["def"]);
        $minmax["def"]=[$mindef,$maxdef];

        $minspatk=min($colonne["sp_atk"]);
        $maxspatk=max($colonne["sp_atk"]);
        $minmax["sp_atk"]=[$minspatk,$maxspatk];

        $minspdef=min($colonne["sp_def"]);
        $maxspdef=max($colonne["sp_def"]);
        $minmax["sp_def"]=[$minspdef,$maxspdef];

        $minspeed=min($colonne["speed"]);
        $maxspeed=max($colonne["speed"]);
        $minmax["speed"]=[$minspeed,$maxspeed];
    }
    return $minmax;
}

function normalizer($numero,$min,$max){
    $numero=($numero-$min)/($max-$min);
    //applica la formula matematica, prende in input un numero (x)
    //normalizer chiamta da normalizercsv
    return $numero;
}

function normalizerCSV($pokemon){
    $minmax=ricercaMaxMin($pokemon);
    for ($i=0; $i < count($pokemon); $i++) { 
    $pokemon[$i]["hp"]=normalizer($pokemon[$i]["hp"],$minmax["hp"][0],$minmax["hp"][1]);
    $pokemon[$i]["atk"]=normalizer($pokemon[$i]["atk"],$minmax["atk"][0],$minmax["atk"][1]);
    $pokemon[$i]["def"]=normalizer($pokemon[$i]["def"],$minmax["def"][0],$minmax["def"][1]);
    $pokemon[$i]["sp_atk"]=normalizer($pokemon[$i]["sp_atk"],$minmax["sp_atk"][0],$minmax["sp_atk"][1]);
    $pokemon[$i]["sp_def"]=normalizer($pokemon[$i]["sp_def"],$minmax["sp_def"][0],$minmax["sp_def"][1]);
    $pokemon[$i]["speed"]=normalizer($pokemon[$i]["speed"],$minmax["speed"][0],$minmax["speed"][1]);
    }
    return $pokemon;
}

?>