
function generateInput(label, id, range){
    let div= document.createElement("div");
    div.classList.add("formGroup");
    let _label = document.createElement("label");
    _label.appendChild(document.createTextNode(label));
    _label.setAttribute("for", id);
    div.appendChild(_label);
    let input= document.createElement("input");
    input.id=id;
    input.setAttribute("type", "number");
    input.setAttribute("max", range[1]);
    input.setAttribute("min", range[0]);
    input.setAttribute("placeholder", "Inserisci un numero da "+ range[0]+ " a "+ range[1] )
    input.setAttribute("autoComplete", "off");
    div.appendChild(input);
    return div;

}

let inputs=[
    {
       label: "Punti Vita (HP)",
       id: "hp",
       range: [0, 300]
    },
    {
        label: "Punti Attacco (Attack)",
        id: "atk",
        range: [0, 300]
     },
     {
        label: "Punti Difesa (Defense)",
        id: "def",
        range: [0, 300]
     },
     {
        label: "Punti Attacco Speciale (Sp.Atk)",
        id: "sp-atk",
        range: [0, 300]
     },
     {
        label: "Punti Difesa Speciale (Sp.Defense)",
        id: "sp-def",
        range: [0, 300]
     },
     {
        label: "Punti Velocità (Speed)",
        id: "speed",
        range: [0, 300]
     }
] 

let form = document.querySelector("form");
for(let i=0; i<inputs.length; i++){
    
    form.appendChild(generateInput(inputs[i].label, inputs[i].id, inputs[i].range));

}

function generateCard(pokemon){
   let containerGlobale=document.createElement("div");
   containerGlobale.classList.add("card");
   let divImage= document.createElement("div");
   divImage.classList.add("img");
   let image= document.createElement("img");
   image.src= "/static/img/"+pokemon.id+".jpg";
   image.alt="Immagine di "+pokemon.nome;
   divImage.append(image);
   containerGlobale.append(divImage);
   let divStatistic= document.createElement("div");
   divStatistic.classList.add("stats");
   let h3=document.createElement("h3");
   h3.append(document.createTextNode(pokemon.nome));
   divStatistic.append(h3);
   let p1= document.createElement("p");
   p1.append(document.createTextNode("Gen. "+pokemon.generazione));
   divStatistic.append(p1);
   let p2= document.createElement("p");
   let tipi="";
   for(let i=0; i<pokemon.tipo.length;i++){
      tipi=tipi+pokemon.tipo[i];
      console.log(tipi);
      if(i<pokemon.tipo.length-1){
          tipi=tipi+", ";

      }
   }
   let strongType=document.createElement("strong");
   strongType.append(document.createTextNode(tipi));
   p2.append(document.createTextNode("Tipi: "));
   p2.append(strongType);
   divStatistic.append(p2);
   let lista = document.createElement("ul");
   
   let parametri=["hp", "atk", "def", "sp_atk", "sp_def", "speed"];
   let parametri2=["HP", "Atk", "Def", "Sp. Atk", "Sp. Def", "Speed"];
   for(let i=0; i<parametri.length;i++){
      let li= document.createElement("li");
      let strong=document.createElement("strong");
      strong.append(document.createTextNode(pokemon[parametri[i]]));
      li.append(document.createTextNode(parametri2[i]+" "));
      li.append(strong);
      lista.append(li);
   }
   divStatistic.append(lista);
   containerGlobale.append(divStatistic);
   return containerGlobale;



}

function generateCards(pokemons){
   let results=document.querySelector(".results");
   for(let i=0; i<pokemons.length;i++){
      results.append(generateCard(pokemons[i]));
   }

}


    