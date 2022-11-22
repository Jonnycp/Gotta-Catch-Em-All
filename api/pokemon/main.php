<?php 

function getPokemonById($id,$pokemon){
    for ($i=0; $i < count($pokemon); $i++){
        if($pokemon[$i]["id"]==$id){
            return $pokemon[$i];//cozzalo by dalila
        }        
        //se l'id di pokemon di i è = a quello dell'utente (variabile id) allora restituisco pokemon di i oppure return il pokemon di i
    }
    
}


function distEuclideaGenerica($utente,$pokemon){
$somma=0;

    foreach ($pokemon as $key => $value) {
        if($key=="hp"||$key=="atk"||$key=="def"||$key=="sp_def"||$key=="sp_atk"||$key=="speed"){
            $somma+=pow($utente[$key]-$value,2);
        }
        
    }
    
return sqrt($somma);
}



function distanzePokemon($pokemon,$utente){
    $pokDist=[];
    for ($i=0; $i < count($pokemon); $i++) {
        array_push($pokDist,[$pokemon[$i]["id"],distEuclideaGenerica($utente,$pokemon[$i])]);
    }
    return $pokDist;
}


function ordinamento($pokDist){
    do
    {
            $scambiato = false;
            for( $i = 0, $c = count( $pokDist ) - 1; $i < $c; $i++ )
            {
                if( $pokDist[$i] > $pokDist[$i + 1] )
        {
                    $temp = $pokDist[$i + 1];
                    $pokDist[$i + 1] = $pokDist[$i];
                    $pokDist[$i] = $temp;
                    $scambiato = true;
        }
            }
    }
    while($scambiato);
return $pokDist;
} 

function estrazione($k){

}


?>