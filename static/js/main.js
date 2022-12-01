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
    if(Object.keys(valori).length>=2){
        fetch("/api/pokemon?"+new URLSearchParams(valori))
        .then(r=>{
            if(r.ok){
                r=r.json();
                if(r.length>0){
                    generateCards(r);

                }else{
                    generateErrorMessage("emoj.png", "Nessun pokemon simile trovato", "Prova a cambiare i parametri");
                }
            }else{
                generateErrorMessage("Error.png", "Qualcosa non funziona come previsto", r.status+" - Dalila risolverà al più presto (forse)")

            }
        })
       
        .catch(e =>generateErrorMessage("Error.png", "Qualcosa non funziona come previsto", e.message))
    }
}

 
form.addEventListener("submit", requestPokemon)

