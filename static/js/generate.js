
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


    