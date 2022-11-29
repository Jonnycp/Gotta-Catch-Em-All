let button= document.querySelector("button[type=submit]");
button.disabled=true;
let valori= {};
let input= document.querySelectorAll("input");

input.forEach((elemento, i) => {
    elemento.addEventListener("keyup", () => {
        if(controlloInput(elemento, inputs[i])){
            elemento.classList.remove("error");
            valori[elemento.id]=elemento.value;
          
        }else{
            elemento.classList.add("error");
            delete valori[elemento.id];
        }
        if(elemento.value===""){
            elemento.classList.remove("error");
            delete valori[elemento.id];
        }

        if(Object.keys(valori).length>=2){
            button.disabled=false;
        }else{
            button.disabled=true;
        }
        console.log(valori);
    })
})


function controlloInput(input, limits){
    if(input.value!=""){
        if(!isNaN(input.value)){
            if(input.value>=limits.range[0]&& input.value <= limits.range[1]){
                return true;
            }
        }
}   

    return false;

}



function requestPokemon(e){
    e.preventDefault();
    let mockRichiesta=[{"id":386,"nome":"DeoxysNormal Forme","tipo":["Psychic"],"hp":50,"atk":150,"def":50,"sp_atk":150,"sp_def":50,"speed":150,"generazione":3,"isLegendary":true},{"id":291,"nome":"Ninjask","tipo":["Bug","Flying"],"hp":61,"atk":90,"def":45,"sp_atk":50,"sp_def":50,"speed":160,"generazione":3,"isLegendary":true},{"id":142,"nome":"Aerodactyl","tipo":["Rock","Flying"],"hp":80,"atk":105,"def":65,"sp_atk":60,"sp_def":75,"speed":130,"generazione":1,"isLegendary":true},{"id":65,"nome":"Alakazam","tipo":["Psychic"],"hp":55,"atk":50,"def":45,"sp_atk":135,"sp_def":95,"speed":120,"generazione":1,"isLegendary":true},{"id":386,"nome":"DeoxysNormal Forme","tipo":["Psychic"],"hp":50,"atk":150,"def":50,"sp_atk":150,"sp_def":50,"speed":150,"generazione":3,"isLegendary":true}];
    if(Object.keys(valori).length>=2){
        generateCards(mockRichiesta);
        /*fetch("/api/pokemon?"+new URLSearchParams(valori))
        .then(r=>r.json())
        .then(r=>generateCards(r))
        .catch(e =>console.error(e))*/
    }
}

 
form.addEventListener("submit", requestPokemon)

