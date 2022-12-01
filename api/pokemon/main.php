<?php 

function getPokemonById($id,$pokemon){
    for ($i=0; $i < count($pokemon); $i++){
        if($pokemon[$i]["id"]==$id){
            return $pokemon[$i];//cozzalo by dalila
        }        
    }
    
}


function distEuclideaGenerica($utente,$pokemon){
$somma=0;
    foreach ($pokemon as $key => $pokemonValue) {
        if($key=="hp"||$key=="atk"||$key=="def"||$key=="sp_def"||$key=="sp_atk"||$key=="speed"){
            $utenteValue=isset($utente[$key])?$utente[$key]:0; 
            $somma+=pow($utenteValue-$pokemonValue,2);
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
            for( $i = 0, $c = count( $pokDist ) - 1; $i < $c; $i++ ){
                if( $pokDist[$i][1] > $pokDist[$i + 1][1] ){
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

function estrazione($k,$pokemon,$distanzePokemon){
$distanzePokemon=ordinamento($distanzePokemon);
$kpokemon=[];
for ($i=0; $i < $k; $i++) { 
   array_push($kpokemon,getPokemonById($distanzePokemon[$i][0],$pokemon));
}
return $kpokemon;
}


?>