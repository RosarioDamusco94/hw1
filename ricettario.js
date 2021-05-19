function onJson(json){
    console.log(json);
    const lista = document.querySelector("div.negozio");
    lista.classList.add("lista")
    lista.innerHTML="";
    let tot = json.number;
    for(let i=0; i<tot; i++){
        const oggetto = document.createElement("div");
        oggetto.classList.add("oggetto");
        const nome_ricetta = document.createElement("h3")
        nome_ricetta.classList.add("nome_ricetta")
        nome_ricetta.textContent=json.results[i].name
        oggetto.appendChild(nome_ricetta);
        lista.appendChild(oggetto);
    }
}

function onResponse(response){
    return response.json();
}

function ricerca(event){
    const ricerca= document.querySelector("#ricerca").value;
    console.log(ricerca);
    const form_data = new FormData(form);
    console.log(form_data);
    fetch("ricettario_curl.php", {method: 'post', body: form_data, ricerca}).then(onResponse).then(onJson);
    event.preventDefault();
}

const form = document.querySelector("form");
form.addEventListener('submit', ricerca);