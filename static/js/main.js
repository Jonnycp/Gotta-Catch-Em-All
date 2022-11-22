let button= document.querySelector("button[type=submit]");
let campo= document.querySelector("form")


 function requestPokemon(e) {
    e.preventDefault();
    let input =document.querySelectorAll("input")
   // controlloInputs(input)
    let valori= [];
    let vuoto=0;
   
    for(let i=0; i<input.length;i++){
    //    input[i].addEventListener("keyup", ()=> controlloInputs(input))
    
        valori.push(input[i].value)
        if(valori[i]===""){
          valori[i]=0;
          vuoto=vuoto+1;
          
        }
    }

    if(vuoto<=valori.length-2){
       fetch(`/api/pokemon?hp=${valori[0]}&atk=${valori[1]}&def=${valori[2]}&sp_atk=${valori[3]}&sp_def=${valori[4]}&speed=${valori[5]}`)
       .then(r=>r.json())
       .then(pokemons=>renderCards(pokemons))
       .catch(e=>console.log("gg"))
    }

   // console.log(valori)
    
  
}

function controlloInput(input, limits){
    console.log(input)
    if(input.value!=""){
        if(!isNaN(input.value)){
            if(input.value>=limits.range[0]&& input.value <= limits.range[1]){
                return true;
            }
        }
}   

    return false;

}

function controlloInputs(inputsDom){
    for(i=0; i<inputsDom.length;i++){
        if(controlloInput(inputsDom[i], inputs[i])==false){
            inputsDom[i].classList.add("error");
            button.setAttribute("disabled", true)
    
        }else{
            button.removeAttribute("disabled")
            inputsDom[i].classList.remove("error");

        }
    }
}




 
 form.addEventListener("submit", requestPokemon)

